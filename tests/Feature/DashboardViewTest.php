<?php

namespace Tests\Feature;

use App\Models\Dream;
use App\Models\Pattern;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// Claude:: covers the admin's My/Everyone toggle on the dashboard and the
// dream counts on the patterns page, because both decide what a user may see.
class DashboardViewTest extends TestCase
{
    use RefreshDatabase;

    private function makeDreams(): array
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $other = User::factory()->create(['is_admin' => false]);

        $adminDream = Dream::factory()->create(['user_id' => $admin->id, 'title' => 'A dream of the admin']);
        $otherDream = Dream::factory()->create(['user_id' => $other->id, 'title' => 'A dream of somebody else']);

        return [$admin, $other, $adminDream, $otherDream];
    }

    public function test_a_normal_user_only_ever_sees_their_own_dreams(): void
    {
        [, $other, $adminDream, $otherDream] = $this->makeDreams();

        // Even when they ask for everybody's dreams in the address bar
        $response = $this->actingAs($other)->get('/dashboard?view=all');

        $response->assertOk();
        $response->assertSee($otherDream->title);
        $response->assertDontSee($adminDream->title);
    }

    public function test_a_normal_user_is_not_offered_the_toggle(): void
    {
        [, $other] = $this->makeDreams();

        $this->actingAs($other)->get('/dashboard')->assertDontSee("Everyone's dreams", false);
    }

    public function test_an_admin_sees_every_dream_by_default(): void
    {
        [$admin, , $adminDream, $otherDream] = $this->makeDreams();

        $response = $this->actingAs($admin)->get('/dashboard');

        $response->assertSee($adminDream->title);
        $response->assertSee($otherDream->title);
        $response->assertSee("Everyone's dreams", false);
    }

    public function test_an_admin_can_switch_to_only_their_own_dreams(): void
    {
        [$admin, , $adminDream, $otherDream] = $this->makeDreams();

        $response = $this->actingAs($admin)->get('/dashboard?view=mine');

        $response->assertSee($adminDream->title);
        $response->assertDontSee($otherDream->title);
    }

    public function test_the_patterns_page_counts_public_dreams_only(): void
    {
        $user = User::factory()->create();
        $pattern = Pattern::factory()->create(['name' => 'Falling']);

        $public = Dream::factory()->create(['user_id' => $user->id, 'is_public' => true]);
        $private = Dream::factory()->create(['user_id' => $user->id, 'is_public' => false]);
        $pattern->dreams()->attach([$public->id, $private->id]);

        $patterns = $this->get('/patterns')->viewData('patterns');

        $this->assertSame(1, $patterns->first()->dreams_count);
    }
}
