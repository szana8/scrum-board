<?php

namespace Database\Factories;

use App\Models\IssueType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<IssueType>
 */
class IssueTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->word,
            'icon' => 'storage/icons/issue_types/bug.png',
            'color_code' => $this->faker->colorName,
            'description' => '',
        ];
    }
}
