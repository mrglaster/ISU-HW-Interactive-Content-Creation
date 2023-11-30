<?php
namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        $users = User::all();
        $projects = Project::all();

        return view('tasks.create', compact('users', 'projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function edit(Task $task)
    {
        $users = User::all();
        $projects = Project::all();

        return view('tasks.edit', compact('task', 'users', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function softDelete(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task soft deleted successfully');
    }
}
