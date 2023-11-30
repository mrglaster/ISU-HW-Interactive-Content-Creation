<?php
namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function show(Project $project)
    {
        return response()->json($project);
    }

    public function softDelete(Project $project)
    {
       $project->delete();
       return redirect()->route('projects.index')->with('success', 'Project soft deleted successfully');
    }
    
    
}
