<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        $tags = [
            'Laravel',
            'PHP OOP',
            'Project Lead',
            'MySQL',
            'JavaScript',
            'HTML5',
            'Webhooks',
            'CSS / CSS3',
            'SOA Architecture',
            'REST API',
            'Dropbox API',
            'DataTables',
            'Docker',
            'Git',
            'Jira',
            'Agile',
            'Scrum',
            'Kanban',
            'Trello',
            'Slack',
            'System Architect',
            'DevOps',
            'CI/CD',
        ];

        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->randomElement($tags),
        ];
    }
}
