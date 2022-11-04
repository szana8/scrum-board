<?php

namespace Database\Seeders;

use App\Models\IssueType;
use Illuminate\Database\Seeder;

class IssueTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IssueType::insert([
            [
                'name' => 'Bug',
                'slug' => 'bug',
                'icon' => 'storage/icons/issue_types/bug.png',
                'color_code' => 'red',
                'description' => 'Problem that impairs product or service functionality',
            ],
            [
                'name' => 'Epic',
                'slug' => 'epic',
                'icon' => 'storage/icons/issue_types/epic.png',
                'color_code' => 'purple',
                'description' => 'Large piece of work that encompasses many issues',
            ],
            [
                'name' => 'Improvement',
                'slug' => 'improvement',
                'icon' => 'storage/icons/issue_types/improvement.png',
                'color_code' => 'green',
                'description' => 'Rollout of new technologies or solutions',
            ],
            [
                'name' => 'Story',
                'slug' => 'story',
                'icon' => 'storage/icons/issue_types/story.png',
                'color_code' => 'orange',
                'description' => 'Functionality request expressed from the perspective of the user',
            ],
            [
                'name' => 'Task',
                'slug' => 'task',
                'icon' => 'storage/icons/issue_types/task.png',
                'color_code' => 'blue',
                'description' => 'Task that needs to be done',
            ],
        ]);
    }
}
