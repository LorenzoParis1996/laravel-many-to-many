<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $data = $request->validate([
            'title'=>'required|unique:projects|max:50|min:3',
            'type_id'=>'required|unique:projects',
            'technologies'=>'required|array|exists:technologies,id',
            'developer'=>'required|unique:projects|max:30|min:4',
            'description'=>'required|unique:projects|min:30|max:900',
            'release_date'=>'required|unique:projects|max:30',
            'image'=>'required|unique:projects|image|max:9000'
        ]);

        $img_path = Storage::put('uploads/projects', $data['image']);

        $data["image"] = $img_path;
        $data = $request->all();
        $newProject= new Project($data);
        $newProject-> save();
        $newProject->technologies()->sync($data['technologies']);
        return redirect()->route('admin.projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'=>'required|max:50|min:3',
            'type_id'=>'required',
            'technologies'=>'required',
            'developer'=>'required|max:30|min:4',
            'description'=>'required|min:30|max:900',
            'release_date'=>'required|max:30',
            'image'=>'required|image|max:9000'
        ]);

        $img_path = Storage::put('uploads/projects', $data['image']);
        $data["image"] = $img_path;

        $project-> update($data);
        $project->technologies()->sync($data['technologies']);
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}