<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Mail\ContactMail;
use App\Mail\ResponseMail;
use App\Models\Article;
use App\Models\Contribution;
use App\Models\Experience;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $experiences = Experience::with('tags')
            ->orderByRaw("CASE WHEN company = 'Upwork' THEN 2 WHEN end_date IS NULL THEN 0 ELSE 1 END")
            ->orderBy('start_date', 'desc')
            ->get();
        $contributions = Contribution::with('tags')->get();
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->get();

        $user = User::first();
        $customFields = $user ? ($user->custom_fields ?? []) : [];

        return view('index', compact('experiences', 'contributions', 'testimonials', 'customFields'));
    }

    public function send(CreateRequest $request): RedirectResponse
    {
        Mail::to('zbogoevski@gmail.com')->send(new ContactMail($request->validated()));
        $responseMail = new ResponseMail();
        Mail::to($request->email)->send($responseMail);

        $appUrl = config('app.url', ''); // Default to an empty string if the config is missing
        if (!is_string($appUrl)) {
            throw new \UnexpectedValueException('The app.url configuration value must be a string.');
        }

        return redirect($appUrl . '/#contact')->with('success', 'Message sent successfully.');
    }

    public function articles(): View
    {
        $articles = Article::published()
            ->with('tags')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('articles', compact('articles'));
    }

    public function article(string $slug): View
    {
        $article = Article::whereSlug($slug)
            ->published()
            ->firstOrFail();
        
        // Set SEO data for this specific article
        $seo = [
            'title' => $article->getMetaTitle(),
            'description' => $article->getMetaDescription(),
            'keywords' => $article->meta_keywords ?? '',
            'author' => 'Zoran Bogoevski',
            'robots' => $article->indexable ? 'index, follow' : 'noindex, nofollow',
            'og_type' => 'article',
            'og_site_name' => 'Zoran Dev',
            'og_image' => $article->getOgImage() ? asset($article->getOgImage()) : null,
            'twitter_card' => 'summary_large_image',
            'twitter_site' => '@zorandev',
            'article_published' => $article->created_at?->toIso8601String(),
            'article_modified' => $article->updated_at?->toIso8601String(),
            'article_tags' => $article->tags->pluck('name')->implode(', '),
        ];
        
        // Share SEO data with view
        View::share('seo', $seo);
        View::share('structuredData', $article->getStructuredData());
        
        return view('article', compact('article'));
    }

    public function testimonials(): View
    {
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->get();
        return view('testimonials', compact('testimonials'));
    }

    public function sitemap(): Response
    {
        $articles = Article::published()
            ->indexable()
            ->latest()
            ->get();
        
        $staticPages = [
            ['url' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => '/articles', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => '/testimonials', 'priority' => '0.6', 'changefreq' => 'monthly'],
        ];

        return response()->view('sitemap', [
            'articles' => $articles,
            'staticPages' => $staticPages,
        ])->header('Content-Type', 'text/xml');
    }
    
    /**
     * robots.txt for search engine crawlers
     */
    public function robots(): Response
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "\n";
        $content .= "# Sitemap\n";
        $content .= "Sitemap: " . url('sitemap.xml') . "\n";
        $content .= "\n";
        $content .= "# Disallow admin areas if any\n";
        $content .= "Disallow: /admin\n";
        $content .= "Disallow: /login\n";
        
        return response($content, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
