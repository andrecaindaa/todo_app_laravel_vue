<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_task()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Nova tarefa',
            'priority' => 'high',
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'Nova tarefa']);

        $this->assertDatabaseHas('tasks', ['title' => 'Nova tarefa']);
    }

    /** @test */
    public function it_lists_tasks()
    {
        Task::factory()->count(3)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_updates_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->putJson("/api/tasks/{$task->id}", [
            'title' => 'Atualizada',
            'priority' => 'low',
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Atualizada']);
    }

    /** @test */
    public function it_toggles_task_completion()
    {
        $task = Task::factory()->create(['is_completed' => false]);

        $this->patchJson("/api/tasks/{$task->id}/toggle");

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'is_completed' => true,
        ]);
    }

    /** @test */
    public function it_deletes_a_task()
    {
        $task = Task::factory()->create();

        $this->deleteJson("/api/tasks/{$task->id}");

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
