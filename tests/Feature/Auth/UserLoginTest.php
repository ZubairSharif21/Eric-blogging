<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use DatabaseTransactions;
    public function test_guest_redirected_to_login_page_when_access_dashboard(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_attemp_wrong_credentials(): void
    {
        $response = $this->post('/login', [
            'email' => fake()->email(),
            'password' => fake()->password()
        ]);

        $response->assertSessionHas('loginError');
    }

    public function test_attemp_registered_user(): void
    {
        $users = User::factory(3)->create();

        foreach ($users as $user) {
            $react = $this->actingAs($user)->get('/dashboard');
            $react->assertStatus(200);
            $react->assertSee($user->name);
            $react->assertSee('Dashboard');
        }
    }
}
