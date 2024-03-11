<?php

namespace Tests\Feature\Admin\SubmissionTest;

use App\Models\Submission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_submission_index_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/submissions');

        $response->assertOk();

        Submission::factory(4)->create();

        $response = $this
            ->actingAs($user)
            ->get('/submissions');

        $response->assertOk();

        $response->assertInertia(
            fn (AssertableInertia $page) => $page
            ->has('submissions', 4)
        );
    }
}
