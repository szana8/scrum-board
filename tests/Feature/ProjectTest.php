<?php

namespace Tests\Feature;

use App\Models\Project;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * @test
     */
    public function unauthenticated_users_can_not_get_project_list()
    {
        $response = $this->getJson(route('project.index'));
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_get_project_list()
    {
        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->getJson(route('project.index'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_get_a_specific_project()
    {
        $project = Project::factory()->create();

        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->getJson(route('project.show', $project->slug));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_create_project()
    {
        $project = Project::factory()->make();

        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->postJson(route('project.store'), $project->getAttributes());
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_update_a_project()
    {
        $project = Project::factory()->make();

        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->postJson(route('project.store'), $project->getAttributes());
        $response->assertStatus(201);

        $project->description = 'Modified description';

        $response = $this->putJson(route('project.update', $project->slug), $project->getAttributes());
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_remove_a_project()
    {
        $project = Project::factory()->create();

        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->putJson(route('project.destroy', $project->slug));
        $response->assertStatus(200);
    }
}
