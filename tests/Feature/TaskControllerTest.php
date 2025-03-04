<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TaskControllerTest extends TestCase
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

    public function testUserCanCreateTask()
    {
        $response = $this->post('/tasks', [
            'title' => 'New Task',
            'description' => 'Task description',
            'status' => 'pending',
            'priority' => 2,
            'todo_at' => null,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', [
            'title' => 'New Task',
        ]);
    }

    public function testUserCanListTasks()
    {
        $task = Task::create([
            'user_id' => $this->user->id,
            'title' => 'Existing Task',
            'description' => 'Task description',
            'status' => 'pending',
            'priority' => 2,
            'todo_at' => null,
        ]);

        $response = $this->get('/tasks');
        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => 'Existing Task']);
    }

    public function testUserCanUpdateTask()
    {
        $task = Task::create([
            'user_id' => $this->user->id,
            'title' => 'Task to Update',
            'description' => 'Task description',
            'status' => 'pending',
            'priority' => 2,
            'todo_at' => null,
        ]);

        $response = $this->put('/tasks/' . $task->id, [
            'title' => 'Updated Task',
            'status' => 'completed',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', [
            'title' => 'Updated Task',
            'status' => 'completed',
        ]);
    }

    public function testUserCanDeleteTask()
    {
        $task = Task::create([
            'user_id' => $this->user->id,
            'title' => 'Task to Delete',
            'description' => 'Task description',
            'status' => 'pending',
            'priority' => 2,
            'todo_at' => null,
        ]);

        $response = $this->delete('/tasks/' . $task->id);
        $response->assertStatus(200);
        $this->assertDeleted($task);
    }
}
