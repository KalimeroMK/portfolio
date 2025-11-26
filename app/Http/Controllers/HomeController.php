<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Mail\ContactMail;
use App\Mail\ResponseMail;
use App\Models\Article;
use App\Models\Contribution;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(): View
    {
        $experiences = Experience::with('tags')->get();
        $contributions = Contribution::with('tags')->get();

        $user = User::first();
        $customFields = $user ? ($user->custom_fields ?? []) : [];

        return view('index', compact('experiences', 'contributions', 'customFields'));
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
        $articles = Article::with('tags')->get();
        return view('articles', compact('articles'));
    }

    public function article(string $slug): View
    {
        $article = Article::whereSlug($slug)->firstOrFail();
        return view('article', compact('article'));
    }

    public function sitemap(): Response
    {
        $articles = Article::latest()->get();

        return response()->view('sitemap', [
            'articles' => $articles,
        ])->header('Content-Type', 'text/xml');
    }
}
