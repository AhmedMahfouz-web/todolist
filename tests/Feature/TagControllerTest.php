<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tag;
use App\Models\User;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        // Create a user and authenticate
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testUserCanCreateTag()
    {
        $response = $this->post('/tags', [
            'name' => 'New Tag',
            'color' => '#ff0000',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tags', [
            'name' => 'New Tag',
        ]);
    }

    public function testUserCanListTags()
    {
        $tag = Tag::create([
            'name' => 'Existing Tag',
            'color' => '#00ff00',
        ]);

        $response = $this->get('/tags');
        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => 'Existing Tag']);
    }
}
