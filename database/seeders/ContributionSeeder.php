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
                'title' => 'Laravel Countries',
                'description' => 'Laravel Countries is a package for Laravel, providing Almost ISO 3166_2, 3166_3, currency, Capital and more for all countries including states and cities.',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],
            [
                'title' => 'Casys payment gateway',
                'description' => 'This is a package to integrate Casys payment gateway in Laravel it generates complete scaffolding.',
                'tags' => 'Laravel, Blade, OOP PHP, JavaScript, HTML5, CSS / CSS3'
            ],
            [
                'title' => 'Filterable',
                'description' => 'Address commonly face the problem of adding repetitive filtering code.',
                'tags' => 'Laravel, PHP'
            ],
            [
                'title' => 'Dom Parser',
                'description' => 'Simple Html Dom Parser for Laravel.',
                'tags' => 'Laravel, PHP, JSON'
            ],
            [
                'title' => 'E-commerce',
                'description' => 'Fully functional laravel e-commerce solution API and Web based with Paypal/Stripe/Casys payment gateway.',
                'tags' => 'Laravel, Blade, Payment Providers, Bootstrap, jQuery, OOP PHP, MySQL, JavaScript, HTML5, CSS / CSS3, Docker, 3rd Party Integrations'
            ],
            [
                'title' => 'Docker Images',
                'description' => 'Apache/Nginx + PHP docker image collection.',
                'tags' => 'Docker, Yml'
            ]
        ];

        foreach ($contributions as $contribution) {
            $newContribution = Contribution::create([
                'title' => $contribution['title'],
                'description' => $contribution['description']
            ]);

            $tags = explode(', ', $contribution['tags']);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $newContribution->tags()->attach($tag->id); // Attach the tag to the experience in the pivot table
            }
        }
    }
}
