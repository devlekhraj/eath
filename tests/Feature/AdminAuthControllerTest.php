<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class AdminAuthControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Config::set('jwt.secret', str_repeat('a', 64));
        Config::set('jwt.ttl', 60);
        Config::set('jwt.blacklist_enabled', true);
    }

    public function test_admin_login_succeeds_with_valid_username_password_and_active_account(): void
    {
        $admin = $this->createAdmin();

        $response = $this->postJson('/api/v1/admin/login', [
            'username' => $admin->username,
            'password' => 'secret123',
        ]);

        $response->assertOk()
            ->assertJsonStructure(['access_token', 'token_type', 'expires_in'])
            ->assertJsonPath('token_type', 'bearer');
    }

    public function test_admin_login_returns_422_for_missing_fields(): void
    {
        $response = $this->postJson('/api/v1/admin/login', []);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'errors' => ['username', 'password'],
            ]);
    }

    public function test_admin_login_returns_422_for_unknown_username(): void
    {
        $response = $this->postJson('/api/v1/admin/login', [
            'username' => 'unknown-admin',
            'password' => 'secret123',
        ]);

        $response->assertStatus(422)
            ->assertJsonPath('errors.password.0', 'Invalid username or password.');
    }

    public function test_admin_login_returns_422_for_wrong_password(): void
    {
        $admin = $this->createAdmin();

        $response = $this->postJson('/api/v1/admin/login', [
            'username' => $admin->username,
            'password' => 'wrongpass',
        ]);

        $response->assertStatus(422)
            ->assertJsonPath('errors.password.0', 'Invalid username or password.');
    }

    public function test_admin_login_succeeds_for_non_active_account_when_credentials_are_valid(): void
    {
        $admin = $this->createAdmin([
            'is_active' => false,
            'status' => 'inactive',
        ]);

        $response = $this->postJson('/api/v1/admin/login', [
            'username' => $admin->username,
            'password' => 'secret123',
        ]);

        $response->assertOk()
            ->assertJsonStructure(['access_token', 'token_type', 'expires_in'])
            ->assertJsonPath('token_type', 'bearer');
    }

    public function test_admin_profile_returns_authenticated_admin(): void
    {
        $admin = $this->createAdmin();
        $token = auth('api_admin')->login($admin);

        $response = $this->withHeader('Authorization', "Bearer {$token}")
            ->getJson('/api/v1/admin/profile');

        $response->assertOk()
            ->assertJsonPath('data.username', $admin->username);
    }

    public function test_admin_logout_invalidates_token_and_protected_route_fails(): void
    {
        $admin = $this->createAdmin();
        $token = auth('api_admin')->login($admin);

        $this->withHeader('Authorization', "Bearer {$token}")
            ->postJson('/api/v1/admin/logout')
            ->assertOk()
            ->assertJsonPath('message', 'Successfully logged out');

        $this->withHeader('Authorization', "Bearer {$token}")
            ->getJson('/api/v1/admin/profile')
            ->assertStatus(401);
    }

    public function test_admin_refresh_returns_a_new_token_payload(): void
    {
        $admin = $this->createAdmin();
        $token = auth('api_admin')->login($admin);

        $response = $this->withHeader('Authorization', "Bearer {$token}")
            ->postJson('/api/v1/admin/refresh');

        $response->assertOk()
            ->assertJsonStructure(['access_token', 'token_type', 'expires_in'])
            ->assertJsonPath('token_type', 'bearer');
    }

    protected function createAdmin(array $overrides = []): Admin
    {
        return Admin::query()->create(array_merge([
            'fname' => 'System',
            'lname' => 'Admin',
            'username' => 'adminuser',
            'email' => 'admin@example.com',
            'mobile_no' => '9800000000',
            'dob' => '1990-01-01',
            'joined_date' => '2020-01-01',
            'password' => 'secret123',
            'is_active' => true,
            'status' => 'active',
            'email_verified_at' => now(),
        ], $overrides));
    }
}
