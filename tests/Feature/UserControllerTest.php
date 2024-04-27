<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testStore()
    {
        $formData = [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'address' => null  
        ];
    
        $response = $this->json('POST', '/api/users', $formData);
        $response->assertStatus(201);
    }
    

    public function testUpdate()
    {
        $user = User::factory()->create();

        $updateData = [
            'first_name' => 'Updated Name',
            'last_name' => 'Updated Last name',
            'email' => $user->email, // No change to email
        ];

        $response = $this->json('PUT', "/api/users/{$user->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $user->id,
                     'first_name' => 'Updated Name',
                     'last_name' => 'Updated Last name',
                     'email' => $user->email
                 ]);
    }

    public function testDestroy()
    {
        $user = User::factory()->create();

        $response = $this->json('DELETE', "/api/users/{$user->id}");

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function testIndex()
    {
        $users = User::factory()->count(5)->create();

        $response = $this->json('GET', '/api/users');

        $response->assertStatus(200)
                 ->assertJsonCount(5)
                 ->assertJsonStructure([
                     '*' => ['id', 'first_name', 'last_name', 'email']
                 ]);
    }
}
