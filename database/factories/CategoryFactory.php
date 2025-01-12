<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categories = ["Frontend", "Backend", "Full-stack", "Mobile", "Database"];
        $category = $this->faker->unique()->randomElement($categories);

        $splitted = explode(' ', strtolower($category));
        return [
            'name' => $category,
            'slug' => count($splitted) > 1 ? join(' ', $splitted) : $splitted[0],
        ];
    }
}
