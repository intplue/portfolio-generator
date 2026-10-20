<?php

namespace Tests\Feature;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthAndSharingTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login_when_visiting_protected_routes(): void
    {
        $response = $this->get('/portfolio/manage');

        $response->assertRedirect('/login');
    }

    public function test_users_can_only_access_their_own_portfolios(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $portfolio = Portfolio::create([
            'user_id' => $owner->id,
            'full_name' => 'Alpha User',
            'email' => 'alpha@example.com',
            'template' => 'simple',
        ]);

        $this->actingAs($owner)
            ->get('/portfolio/' . $portfolio->id . '/edit')
            ->assertOk();

        $this->actingAs($otherUser)
            ->get('/portfolio/' . $portfolio->id . '/edit')
            ->assertStatus(403);
    }

    public function test_shared_portfolio_is_public_but_invalid_tokens_are_blocked(): void
    {
        $user = User::factory()->create();

        $portfolio = Portfolio::create([
            'user_id' => $user->id,
            'full_name' => 'Shared Portfolio',
            'email' => 'shared@example.com',
            'template' => 'simple',
            'is_public' => true,
            'share_token' => 'public-share-token',
        ]);

        $this->get('/shared/' . $portfolio->share_token)
            ->assertOk()
            ->assertSee('Shared Portfolio');

        $this->get('/shared/not-real-token')
            ->assertNotFound();
    }
}
