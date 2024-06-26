<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|max:255|unique:projects',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'array',
            'technologies.*' => 'exists:technologies,id'
        ]);

        $project = Project::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'slug' => $validatedData['slug'],
            'type_id' => $validatedData['type_id'],
        ]);

        if ($request->has('technologies')) {
            $project->technologies()->sync($validatedData['technologies']);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $project->id,
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $project->update($validatedData);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->technologies()->detach();
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
