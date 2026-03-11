<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class SeoMiddleware
{
    /**
     * Default SEO data
     */
    protected array $defaultSeo = [
        'title' => 'Zoran Bogoevski | Web Developer & PHP Expert',
        'description' => 'Experienced PHP & Laravel developer from Macedonia. Building scalable web applications, APIs, and digital solutions. View my portfolio and get in touch.',
        'keywords' => 'web developer, php developer, laravel developer, macedonia, skopje, web development, programmer',
        'author' => 'Zoran Bogoevski',
        'robots' => 'index, follow',
        'og_type' => 'website',
        'og_site_name' => 'Zoran Dev',
        'twitter_card' => 'summary_large_image',
        'twitter_site' => '@zorandev',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $seo = $this->getSeoData($request);
        
        // Share SEO data with all views
        View::share('seo', $seo);
        View::share('structuredData', $this->getStructuredData($request));
        
        return $next($request);
    }

    /**
     * Get SEO data based on current route
     */
    protected function getSeoData(Request $request): array
    {
        $routeName = $request->route()?->getName();
        $seo = $this->defaultSeo;
        
        switch ($routeName) {
            case 'home':
                $seo['title'] = 'Zoran Bogoevski | Web Developer & PHP Expert | Macedonia';
                $seo['description'] = 'Full-stack PHP & Laravel developer with 10+ years experience. Building scalable web applications, APIs, and digital solutions in Macedonia and worldwide.';
                break;
                
            case 'articles':
                $seo['title'] = 'Blog & Articles | Web Development Insights | Zoran Dev';
                $seo['description'] = 'Read articles about PHP, Laravel, web development best practices, and programming tips from an experienced developer.';
                $seo['og_type'] = 'website';
                break;
                
            case 'article':
                // This will be overridden in controller with article data
                break;
                
            case 'testimonials':
                $seo['title'] = 'Client Testimonials | Web Development Reviews | Zoran Dev';
                $seo['description'] = 'See what clients say about working with me. Reviews and testimonials from satisfied customers worldwide.';
                break;
                
            case 'sitemap':
                $seo['robots'] = 'noindex, follow';
                break;
        }
        
        // Ensure title doesn't exceed 60 chars for optimal display
        if (strlen($seo['title']) > 60) {
            $seo['title'] = Str::limit($seo['title'], 57, '...');
        }
        
        // Ensure description doesn't exceed 160 chars
        if (strlen($seo['description']) > 160) {
            $seo['description'] = Str::limit($seo['description'], 157, '...');
        }
        
        return $seo;
    }

    /**
     * Get structured data for current page
     */
    protected function getStructuredData(Request $request): ?array
    {
        $routeName = $request->route()?->getName();
        $url = $request->url();
        
        $person = [
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => 'Zoran Bogoevski',
            'url' => 'https://zorandev.info',
            'image' => 'https://zorandev.info/images/profile.jpg',
            'jobTitle' => 'Web Developer',
            'description' => 'PHP & Laravel Expert',
            'sameAs' => [
                'https://github.com/KalimeroMK',
                'https://linkedin.com/in/zoranbogoevski',
                'https://twitter.com/zorandev',
            ],
            'worksFor' => [
                '@type' => 'Organization',
                'name' => 'Zoran Dev',
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'MK',
                'addressLocality' => 'Skopje',
            ],
        ];
        
        if ($routeName === 'home') {
            return [
                $person,
                [
                    '@context' => 'https://schema.org',
                    '@type' => 'WebSite',
                    'name' => 'Zoran Dev',
                    'url' => 'https://zorandev.info',
                    'potentialAction' => [
                        '@type' => 'SearchAction',
                        'target' => [
                            '@type' => 'EntryPoint',
                            'urlTemplate' => 'https://zorandev.info/articles?search={search_term_string}',
                        ],
                        'query-input' => 'required name=search_term_string',
                    ],
                ],
            ];
        }
        
        if ($routeName === 'articles') {
            return [
                $person,
                [
                    '@context' => 'https://schema.org',
                    '@type' => 'Blog',
                    'name' => 'Zoran Dev Blog',
                    'url' => $url,
                    'description' => 'Web development articles and insights',
                    'author' => [
                        '@type' => 'Person',
                        'name' => 'Zoran Bogoevski',
                    ],
                ],
            ];
        }
        
        return [$person];
    }
}
