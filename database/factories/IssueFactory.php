<?php

namespace Database\Factories;

use App\Enums\Priority;
use App\Models\IssueType;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;

        return [
            'title'                   => $title,
            'body'                    => $this->faker->paragraph(10),
            'slug'                    => Str::slug($title),
            'issue_type_id'                 => function () {
                return IssueType::inRandomOrder()->first()->id;
            },
            'project_id'              => function () {
                return Project::inRandomOrder()->first()->id;
            },
            'environment'              => 'dev',
            //'components'              => 'Dev',
            'priority'             => function () {
                return Arr::random((Priority::cases()));
            },
            //'epic_link_id'            => null,
            //'sprint_id'               => null,
            //'fix_versions'            => null,
            'status'                  => 'open',
            'due_date'                => $this->faker->dateTime(),
            'original_estimate_time'  => null,
            'remaining_estimate_time' => null,
            'reporter_id'             => function () {
                return User::inRandomOrder()->first()->id;
            },
            'assignee_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}
