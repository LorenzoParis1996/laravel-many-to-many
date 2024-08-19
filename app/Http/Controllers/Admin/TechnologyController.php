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
    public function store(Request $request, Technology $technology)
    {
        $data = $request->validate([
            'name'=>'required|unique:technologies|max:30|min:3'
        ]);

        $data = $request->all();
        $newTechnology= new Technology($data);
        $newTechnology->save();
        return redirect()->route('admin.technologies.show', $newTechnology);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $data = $request->validate([
            'name'=>'required|max:50|min:5'
        ]);

        $technology-> update($data);
        return redirect()->route('admin.technologies.show', $technology);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index');
    }
}