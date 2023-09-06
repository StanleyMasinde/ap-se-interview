<?php

namespace Tests\Feature;

use App\Models\Admin;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * Admin login
     */
    public function testAdminCanLogin(): void
    {
        Admin::factory()
            ->create([
                'email' => 'john@example.com',
                'password' => Hash::make('12345678')
            ]);

        $this->postJson('/admin/login', [
            'email' => 'john@example.com',
            'password' => '12345678'
        ])
            ->assertRedirect('/admin/dashboard');
    }

    /**
     * Admin login
     */
    public function testAdminLoginFails(): void
    {
        Admin::factory()
            ->create([
                'email' => 'john@example.com',
                'password' => 'foo'
            ]);

        $this->postJson('/admin/login', [
            'email' => 'john@example.com',
            'password' => '12345678'
        ])
            ->assertStatus(422);
    }
}
