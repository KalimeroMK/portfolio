<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run()
    {
        $experiences = [
            [
                'company' => 'Orangemelons',
                'position' => 'Senior Full Stack Software Engineer | Tech Lead',
                'employment_type' => 'Full time',
                'start_date' => '2022-11-01',
                'end_date' => null,
                'description' => 'Building and maintaining RESTful APIs, Architecting and designing the database structure, Developing custom Laravel packages, Implementing custom wrappers for 3rd party solutions, Writing clean and modular code based on SOA (Service Oriented Architecture), Created custom dockerized solutions.',
                'tags' => 'Laravel, PHP, OOP PHP, Tech Lead, MySQL, SOA Architecture, REST API, DataTables, Docker, Bitbucket, Jira'
            ],
            [
                'company' => 'Growth Engineering Ltd',
                'position' => 'Senior Full Stack Software Engineer | Tech Lead',
                'employment_type' => 'Part time',
                'start_date' => '2022-11-01',
                'end_date' => '2023-07-01',
                'description' => 'Building and maintaining RESTful APIs, Architecting and designing the database structure, Developing custom Laravel packages, Implementing custom wrappers for 3rd party solutions, Writing clean and modular code based on SOA (Service Oriented Architecture), Created custom dockerized solutions.',
                'tags' => 'Laravel, PHP, OOP PHP, Tech Lead, MySQL, SOA Architecture, REST API, DataTables, Docker, Bitbucket, Jira'
            ],
            [
                'company' => 'Axellero',
                'position' => 'Senior Full Stack Software Engineer | Project Lead Developer',
                'employment_type' => 'Freelance Contractor',
                'start_date' => '2021-10-01',
                'end_date' => '2022-11-01',
                'description' => 'Developing and managing RESTful APIs, Designing and structuring databases, Creating custom wrappers for third-party solutions, Crafting clean and modular code using SOA, Designing and implementing a customized Admin Dashboard.',
                'tags' => 'Laravel, PHP, OOP PHP, Project Lead, MySQL, JavaScript, HTML5, CSS / CSS3, SOA Architecture, REST API, Dropbox API, DataTables, Docker, Bitbucket, Jira'
            ],
            [
                'company' => 'Fueloyal',
                'position' => 'Senior Full Stack Software Engineer | Project Lead Developer',
                'employment_type' => 'Full Time',
                'start_date' => '2021-10-01',
                'end_date' => '2022-11-01',
                'description' => 'Building and maintaining RESTful APIs, Architecting and designing the database structure, Implementing custom wrappers for 3rd party solutions, Writing clean and modular code based on SOA.',
                'tags' => 'Laravel, PHP, OOP PHP, Project Lead, MySQL, JavaScript, HTML5, CSS / CSS3, DataTables, Docker, Gitlab, Jira'
            ],
            [
                'company' => 'Cosmic Development',
                'position' => 'Senior PHP Developer',
                'employment_type' => 'Full Time',
                'start_date' => '2020-03-01',
                'end_date' => '2021-11-01',
                'description' => 'Building RESTful APIs, Creating well-structured and optimized database designs, Writing clean, modular code following SOA principles, Implementing a user-friendly Admin Dashboard.',
                'tags' => 'Laravel, PHP, MySQL, Webhooks, REST API, HTML5, CSS / CSS3, Bootstrap 3/4, Payment Providers, Jira, Docker'
            ],
            [
                'company' => 'Avicena 4IT',
                'position' => 'Team Lead / Senior PHP Developer',
                'employment_type' => 'Full Time',
                'start_date' => '2019-05-01',
                'end_date' => '2020-03-01',
                'description' => 'Developing and managing RESTful APIs, Designing precise and well-structured databases, Creating seamless integrations with third-party solutions, Implementing clean and modular code using SOA principles.',
                'tags' => 'Laravel, PHP, OOP PHP, Team Lead, MySQL, HTML5, CSS / CSS3, Bootstrap 3, REST API, Webhooks, Github, Code Review, Docker'
            ],
            [
                'company' => 'Elikosoft',
                'position' => 'Software Engineer',
                'employment_type' => 'FullTime',
                'start_date' => '2018-11-01',
                'end_date' => '2019-04-01',
                'description' => 'Developing and managing RESTful APIs, Designing precise databases, Creating integrations with third-party solutions, Writing clean, modular code using SOA, Working with PHP Laravel and .NET technologies.',
                'tags' => 'ASP.NET, Project Lead, SQL, JavaScript, Stripe, HTML5, CSS / CSS3, Bootstrap 3, REST API, Github, Code Review'
            ],
            [
                'company' => 'Digitalpresent',
                'position' => 'Full Stack PHP Developer',
                'employment_type' => 'Full Team',
                'start_date' => '2018-03-01',
                'end_date' => '2018-11-01',
                'description' => 'Full Stack PHP Developer, building RESTful APIs, architecting and designing database structures, implementing custom wrappers for 3rd party solutions, writing clean and modular code based on SOA.',
                'tags' => 'OOP PHP, Laravel, MySQL, JavaScript, HTML5, CSS / CSS3, LESS, SASS, SCSS, WordPress, Docker, Bitbucket, Jira'
            ],
            [
                'company' => 'Macedonian Orthodox Church',
                'position' => 'Full Stack PHP Developer | WordPress | Laravel',
                'employment_type' => 'Full Time',
                'start_date' => '2014-07-01',
                'end_date' => '2018-01-01',
                'description' => 'Developing web sites, optimizing them using PHP custom code or WordPress, redesigning pages, replacing Joomla platforms with custom code or WordPress, integrating panoramic views of churches and monasteries.',
                'tags' => 'PHP, OOP PHP, MySQL, JavaScript, HTML5, CSS / CSS3, WordPress, Photoshop, Docker, Pano2VR, Bitbucket, Jira'
            ],
            [
                'company' => 'Virgo',
                'position' => 'Full Stack PHP Developer | Laravel Developer | WordPress',
                'employment_type' => 'Full Time',
                'start_date' => '2012-11-01',
                'end_date' => '2014-07-01',
                'description' => 'Full Stack PHP Developer, implementing and architecting solutions using WordPress and Laravel 4 / 5, transforming requirements into user stories.',
                'tags' => 'Laravel, Blade, WordPress, Payment Providers, Bootstrap, jQuery, OOP PHP, MySQL, JavaScript, HTML5, CSS / CSS3, Bootstrap 3, Gitlab, Jira, 3rd Party Integrations'
            ],
            [
                'company' => 'Upwork',
                'position' => 'Senior PHP Developer | Laravel Developer',
                'employment_type' => 'Freelancer',
                'start_date' => '2012-04-01',
                'end_date' => null, // ongoing
                'description' => 'Working as a Senior PHP Developer on web design and custom CMS solutions, Laravel REST API / WEB development, Laravel package development, WordPress development, building custom themes.',
                'tags' => 'Laravel, WordPress, PHP, Docker, MySQL, JavaScript, HTML5, CSS / CSS3, Bootstrap, REST API, Webhooks, 3rd Party API Integrations'
            ]
        ];

        foreach ($experiences as $experience) {
            $newExperience = Experience::create([
                'company' => $experience['company'],
                'position' => $experience['position'],
                'employment_type' => $experience['employment_type'],
                'start_date' => Carbon::parse($experience['start_date']),
                'end_date' => $experience['end_date'] ? Carbon::parse($experience['end_date']) : null,
                'description' => $experience['description']
            ]);

            $tags = explode(', ', $experience['tags']); // Split tags by comma and space
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $newExperience->tags()->attach($tag->id); // Attach the tag to the experience in the pivot table
            }
        }
    }
}
