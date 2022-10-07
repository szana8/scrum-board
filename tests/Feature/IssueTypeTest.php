<?php

namespace Tests\Feature;

use App\Models\IssueType;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Tests\TestCase;

class IssueTypeTest extends TestCase
{
    /**
     * @test
     */
    public function unauthenticated_users_can_not_get_issue_type_list()
    {
        $response = $this->getJson(route('issue-type.index'));
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_get_issue_type_list()
    {
        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->getJson(route('issue-type.index'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_get_a_specific_project()
    {
        $issueType = IssueType::factory()->create();

        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->getJson(route('issue-type.show', $issueType->slug));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_create_issue_type()
    {
        $issueType = IssueType::factory()->make();

        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->postJson(route('issue-type.store'), $issueType->getAttributes());
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_update_a_issue_type()
    {
        $issueType = IssueType::factory()->make();

        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->postJson(route('issue-type.store'), $issueType->getAttributes());
        $response->assertStatus(201);

        $issueType->description = 'Modified description';

        $response = $this->putJson(route('issue-type.update', $issueType->slug), $issueType->getAttributes());
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_remove_a_issue_type()
    {
        $issueType = IssueType::factory()->create();

        Passport::actingAsClient(
            Client::factory(['user_id' => 1])->create(),
            ['check-status']
        );

        $response = $this->putJson(route('issue-type.destroy', $issueType->slug));
        $response->assertStatus(200);
    }
}
