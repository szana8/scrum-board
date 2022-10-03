<?php

namespace Database\Factories;

use App\Enums\ProjectType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->words(2, true);
        $type = $this->faker->randomElement(array_map(fn ($type) => $type->name, \App\Enums\ProjectType::cases()));

        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name),
            'description' => $this->faker->paragraph,
            'type' => $type,
            'icon' => function () use ($type) {
                return \Illuminate\Support\Facades\Storage::url('public/icons/project/'.$type.'.svg');
            },
            'owner_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}