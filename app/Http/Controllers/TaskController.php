<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $tasks = Task::where('user_id', $user->id)
            ->when($request->has('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->input('search') . '%');
            })
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $task = new Task([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'user_id' => Auth::user()->id,
        ]);

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($task->user_id != Auth::user()->id) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task.');
        }

        $task->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id != Auth::user()->id) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to delete this task.');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
