<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        $techs = Technology::all();

        return view('admin.projects.create', compact('types', 'techs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Helper::generateSlug($data['name'], Project::class);

        if (array_key_exists('img_path', $data)) {
            $path_image = Storage::put('uploads', $data['img_path']);
            $name_image = $request->file('img_path')->getClientOriginalName();
            $data['img_path'] = $path_image;
            $data['img_name'] = $name_image;
        }

        $new_project = Project::create($data);

        if (array_key_exists('techs', $data)) {
            $new_project->technologies()->attach($data['techs']);
        }

        return redirect(route('admin.projects.show', $new_project))->with('create_confirm', 'Progetto aggiunto correttamente!');
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

        $techs = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'techs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->all();

        if ($data['name'] != $project->name) {
            $data['slug'] = Helper::generateSlug($data['name'], Project::class);
        }

        if ($data['type_id'] != $project->id) {
            $data['slug'] = Helper::generateSlug($data['type_id'], Type::class);
        }

        if (array_key_exists('img_path', $data)) {
            if ($project->path_image) {
                Storage::delete($project->path_image);
            }
            $path_image = Storage::put('uploads', $data['img_path']);
            $name_image = $request->file('img_path')->getClientOriginalName();
            $data['img_path'] = $path_image;
            $data['img_name'] = $name_image;
        }

        $project->update($data);

        if (array_key_exists('techs', $data)) {
            $project->technologies()->sync($data['techs']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', compact('project'))->with('edit_confirm', 'Progetto modificato correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->path_image) {
            Storage::delete($project->path_image);
        }

        $project->delete();

        return redirect(route('admin.projects.index'))->with('delete_confirm', 'Progetto "' . $project->name . '" eliminato correttamente');
    }
}
