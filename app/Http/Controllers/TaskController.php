<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        return Auth::user()->tasks()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Auth::user()->tasks()->create($request->only(['title', 'description']));

        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = Auth::user()->tasks()->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Auth::user()->tasks()->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->update($request->only(['title', 'description', 'is_completed']));

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Auth::user()->tasks()->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
