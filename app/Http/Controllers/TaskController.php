<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Listar tarefas com filtros
     */
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('completed') && $request->completed !== '') {
            $query->where('is_completed', $request->boolean('completed'));
        }

        if ($request->priority) {
            $query->where('priority', $request->priority);
        }

        if ($request->due_date) {
            $query->whereDate('due_date', $request->due_date);
        }

        return response()->json(
            $query->orderBy('created_at', 'desc')->get()
        );
    }

    /**
     * Criar nova tarefa
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    /**
     * Atualizar tarefa
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
            'is_completed' => 'boolean',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    /**
     * Eliminar tarefa
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }

    /**
     * Marcar como concluída / pendente
     */
    public function toggle(Task $task)
    {
        $task->update([
            'is_completed' => ! $task->is_completed
        ]);

        return response()->json($task);
    }
}
