<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:technologies|max:255',
        ]);

        Technology::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $technology = Technology::findOrFail($id);
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:technologies,name,' . $id . '|max:255',
        ]);

        $technology = Technology::findOrFail($id);
        $technology->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technology = Technology::findOrFail($id);
        $technology->delete();

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology deleted successfully.');
    }
}
