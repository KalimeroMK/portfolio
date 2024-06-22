<?php

namespace Database\Seeders;

use App\Models\Contribution;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContributionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contributions')->delete();
        DB::table('contribution_tag')->delete();

        $contributions = [
            [
                'title' => 'RssFeed Laravel Package',
                'url' => 'https://github.com/KalimeroMK/RssFeed',
                'description' => 'This package provides an easy way to parse RSS feeds and save them into your application. It offers features like fetching the entire content of an RSS feed, saving images found in the feed items, and getting the full content of each item in the feed. The package is designed to be easy to use and flexible, allowing you to customize the way you parse and save the feed items. It also provides a simple interface for fetching the feed items and displaying them in your application.',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],
            [
                'title' => 'Halkbank Payment Gateway for Laravel',
                'url' => 'https://github.com/KalimeroMK/Halk',
                'description' => "Integrate Halkbank's online payment gateway seamlessly into your Laravel application with this dedicated package. Designed specifically for Macedonian businesses, this package provides an easy-to-use interface for integrating Halkbank payment services into your Laravel application.",
                'tags' => 'Docker, Yml',
            ],
            [
                'title' => 'E-commerce',
                'url' => 'https://github.com/KalimeroMK/LaravelEcomm',
                'description' => 'Fully functional laravel e-commerce solution API and Web based with Paypal/Stripe/Casys payment gateway.',
                'tags' => 'Laravel, Blade, Payment Providers, Bootstrap, jQuery, OOP PHP, MySQL, JavaScript, HTML5, CSS / CSS3, Docker, 3rd Party Integrations'
            ],
            [
                'title' => 'Laravel Countries',
                'description' => 'Laravel Countries is a package for Laravel, providing Almost ISO 3166_2, 3166_3, currency, Capital and more for all countries including states and cities.',
                'url' => 'https://github.com/KalimeroMK/countries',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],
            [
                'title' => 'Casys payment gateway',
                'description' => 'This is a package to integrate Casys payment gateway in Laravel it generates complete scaffolding.',
                'url' => 'https://github.com/KalimeroMK/casys',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],
            [
                'title' => 'Filterable',
                'url' => 'https://github.com/KalimeroMK/filterable',
                'description' => 'Address commonly face the problem of adding repetitive filtering code.',
                'tags' => 'Laravel, PHP'
            ],
            [
                'title' => 'Dom Parser',
                'url' => 'https://github.com/KalimeroMK/Htmldom',
                'description' => 'Simple Html Dom Parser for Laravel.',
                'tags' => 'Laravel, PHP, JSON'
            ],
            [
                'title' => 'Docker Images',
                'url' => 'https://github.com/KalimeroMK/docker-images',
                'description' => 'Apache/Nginx + PHP docker image collection.',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],

        ];

        foreach ($contributions as $contribution) {
            $newContribution = Contribution::create([
                'title' => $contribution['title'],
                'description' => $contribution['description'],
                'url' => $contribution['url'],
            ]);

            $tags = explode(', ', $contribution['tags']);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $newContribution->tags()->attach($tag->id); // Attach the tag to the experience in the pivot table
            }
        }
    }
}
