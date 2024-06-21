<?php

namespace Database\Factories;

use App\Providers\Contribution;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContributionFactory extends Factory
{
    protected $model = Contribution::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'image' => $this->faker->word(),
            'description' => $this->faker->text(),
        ];
    }
}
