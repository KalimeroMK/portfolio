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
                'type' => 'upstream',
                'title' => 'Laravel Framework',
                'url' => 'https://github.com/laravel/framework/pulls?q=is%3Apr+author%3AKalimeroMK',
                'description' => 'Merged PR #61285, which fixed a route name being silently dropped when a RouteRegistrar action is not callable. PR #61646 is under review: attributes written on a named Blade slot were never reachable from the aware directive inside that slot, because they sat in the slot stack instead of the component data the lookup walks.',
                'tags' => 'Laravel, PHP, Open Source, Blade'
            ],
            [
                'type' => 'upstream',
                'title' => 'Yii 3',
                'url' => 'https://github.com/yiisoft/db/pulls?q=is%3Apr+author%3AKalimeroMK+is%3Amerged',
                'description' => 'Eleven merged pull requests across the Yii 3 database and HTTP packages. Added the UuidValue expression to yiisoft/db for DBMS-independent UUID binding, together with the MySQL, SQLite and Oracle driver implementations. Also contributed SerializationFailureException for SQLSTATE 40001 deadlocks, ETag normalization in HttpCacheMiddleware, backed enumerations as route names in yiisoft/router, and Sentry cron monitoring through check-ins.',
                'tags' => 'Yii, PHP, Open Source, Databases'
            ],
            [
                'type' => 'package',
                'title' => 'RssFeed Laravel Package',
                'url' => 'https://github.com/KalimeroMK/RssFeed',
                'description' => 'This package provides an easy way to parse RSS feeds and save them into your application. It offers features like fetching the entire content of an RSS feed, saving images found in the feed items, and getting the full content of each item in the feed. The package is designed to be easy to use and flexible, allowing you to customize the way you parse and save the feed items. It also provides a simple interface for fetching the feed items and displaying them in your application.',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],
            [
                'type' => 'package',
                'title' => 'Halkbank Payment Gateway for Laravel',
                'url' => 'https://github.com/KalimeroMK/Halk',
                'description' => "Integrate Halkbank's online payment gateway seamlessly into your Laravel application with this dedicated package. Designed specifically for Macedonian businesses, this package provides an easy-to-use interface for integrating Halkbank payment services into your Laravel application.",
                'tags' => 'Docker, Yml',
            ],
            [
                'type' => 'package',
                'title' => 'E-commerce',
                'url' => 'https://github.com/KalimeroMK/LaravelEcomm',
                'description' => 'Fully functional laravel e-commerce solution API and Web based with Paypal/Stripe/Casys payment gateway.',
                'tags' => 'Laravel, Blade, Payment Providers, Bootstrap, jQuery, OOP PHP, MySQL, JavaScript, HTML5, CSS / CSS3, Docker, 3rd Party Integrations'
            ],
            [
                'type' => 'package',
                'title' => 'Laravel Countries',
                'description' => 'Laravel Countries is a package for Laravel, providing Almost ISO 3166_2, 3166_3, currency, Capital and more for all countries including states and cities.',
                'url' => 'https://github.com/KalimeroMK/countries',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],
            [
                'type' => 'package',
                'title' => 'Casys payment gateway',
                'description' => 'This is a package to integrate Casys payment gateway in Laravel it generates complete scaffolding.',
                'url' => 'https://github.com/KalimeroMK/casys',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],
            [
                'type' => 'package',
                'title' => 'Filterable',
                'url' => 'https://github.com/KalimeroMK/filterable',
                'description' => 'Address commonly face the problem of adding repetitive filtering code.',
                'tags' => 'Laravel, PHP'
            ],
            [
                'type' => 'package',
                'title' => 'Dom Parser',
                'url' => 'https://github.com/KalimeroMK/Htmldom',
                'description' => 'Simple Html Dom Parser for Laravel.',
                'tags' => 'Laravel, PHP, JSON'
            ],
            [
                'type' => 'upstream',
                'title' => 'FrankenPHP: Yii 3 documentation',
                'url' => 'https://frankenphp.dev/docs/yii3/',
                'description' => 'Wrote the official Yii 3 page for the FrankenPHP documentation, requested by the Yii core team. It covers running a Yii 3 app on the FrankenPHP Docker image, a local install with a Caddyfile, and worker mode via the yiisoft/yii-runner-frankenphp package, including the watch directive, the MAX_REQUESTS variable, and resetting stateful services between requests. Merged into php/frankenphp as PR #2615.',
                'tags' => 'Yii, PHP, FrankenPHP, Docker, Open Source, Technical Writing'
            ],
            [
                'type' => 'package',
                'title' => 'Docker Images',
                'url' => 'https://github.com/KalimeroMK/docker-images',
                'description' => 'Apache/Nginx + PHP docker image collection.',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],

        ];

        foreach ($contributions as $contribution) {
            $newContribution = Contribution::create([
                'title' => $contribution['title'],
                'type' => $contribution['type'],
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
