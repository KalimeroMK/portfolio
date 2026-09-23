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
                'title' => 'symfony/symfony#66205',
                'url' => 'https://github.com/symfony/symfony/pull/66205',
                'description' => 'Review Macedonian (mk) translations for Validator, Form and Security',
                'tags' => ''
            ],
            [
                'type' => 'upstream',
                'title' => 'php/frankenphp#2615',
                'url' => 'https://github.com/php/frankenphp/pull/2615',
                'description' => 'Official <a href="https://frankenphp.dev/docs/yii3/">Yii 3 page</a> for the FrankenPHP docs: Docker image, local Caddyfile setup and worker mode via <code>yiisoft/yii-runner-frankenphp</code>',
                'tags' => ''
            ],
            [
                'type' => 'upstream',
                'title' => 'yiisoft/db#1199',
                'url' => 'https://github.com/yiisoft/db/pull/1199',
                'description' => 'Add <code>UuidValue</code> for portable UUID binding, with driver builders in <a href="https://github.com/yiisoft/db-mysql/pull/482">db-mysql#482</a>, <a href="https://github.com/yiisoft/db-sqlite/pull/432">db-sqlite#432</a> and <a href="https://github.com/yiisoft/db-oracle/pull/411">db-oracle#411</a>',
                'tags' => ''
            ],
            [
                'type' => 'upstream',
                'title' => 'yiisoft/router#296',
                'url' => 'https://github.com/yiisoft/router/pull/296',
                'description' => 'Allow backed enumerations as route name in <code>Route::name()</code>',
                'tags' => ''
            ],
            [
                'type' => 'upstream',
                'title' => 'yiisoft/db#1196',
                'url' => 'https://github.com/yiisoft/db/pull/1196',
                'description' => 'Add <code>SerializationFailureException</code> for SQLSTATE 40001',
                'tags' => ''
            ],
            [
                'type' => 'upstream',
                'title' => 'yiisoft/http-middleware#31',
                'url' => 'https://github.com/yiisoft/http-middleware/pull/31',
                'description' => 'Add ETag value normalization to <code>HttpCacheMiddleware</code>',
                'tags' => ''
            ],
            [
                'type' => 'upstream',
                'title' => 'laravel/framework#61285',
                'url' => 'https://github.com/laravel/framework/pull/61285',
                'description' => 'Fix route name lost when <code>RouteRegistrar</code> action is not callable (Laravel 13)',
                'tags' => ''
            ],
            [
                'type' => 'upstream',
                'title' => 'yiisoft/db#1190',
                'url' => 'https://github.com/yiisoft/db/pull/1190',
                'description' => 'Index schema metadata by table name',
                'tags' => ''
            ],
            [
                'type' => 'upstream',
                'title' => 'yiisoft/yii-sentry#52',
                'url' => 'https://github.com/yiisoft/yii-sentry/pull/52',
                'description' => 'Sentry cron monitoring via check-ins',
                'tags' => ''
            ],
            [
                'type' => 'upstream',
                'title' => 'yiisoft/db-migration#356',
                'url' => 'https://github.com/yiisoft/db-migration/pull/356',
                'description' => 'Friendly error with ready-to-use <code>cp</code> command when running <code>yii-db-migration</code> without config',
                'tags' => ''
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
                'title' => 'Email Check',
                'url' => 'https://github.com/KalimeroMK/email-check',
                'description' => 'Advanced PHP email validation library with multi-layered verification: syntax, domain validity, MX records, SPF, DMARC and disposable email detection, with configurable caching and parallel processing for mass validation.',
                'tags' => 'PHP, Laravel'
            ],
            [
                'type' => 'package',
                'title' => 'Postal Tracking',
                'url' => 'https://github.com/KalimeroMK/postal-tracking-package',
                'description' => 'Lightweight PHP library for tracking postal shipments from Posta na Severna Makedonija, with multi-framework support (Laravel, Yii, native PHP), automatic data transformation and real-time tracking capabilities.',
                'tags' => 'Laravel, Yii, PHP'
            ],
            [
                'type' => 'package',
                'title' => 'SEMrush PHP SDK',
                'url' => 'https://github.com/KalimeroMK/SEMrush',
                'description' => 'Framework-agnostic PHP SDK for the SEMrush API v3/v4 — Analytics, Trends, Projects and Local API.',
                'tags' => 'PHP, API'
            ],

        ];

        foreach ($contributions as $contribution) {
            $newContribution = Contribution::create([
                'title' => $contribution['title'],
                'type' => $contribution['type'],
                'description' => $contribution['description'],
                'url' => $contribution['url'],
            ]);

            $tags = array_filter(explode(', ', $contribution['tags']));
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $newContribution->tags()->attach($tag->id); // Attach the tag to the experience in the pivot table
            }
        }
    }
}
