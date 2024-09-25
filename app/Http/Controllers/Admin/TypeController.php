<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('id', 'desc')->get();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        $exists = Type::where('name', $request->name)->first();

        if (!$exists) {

            $data = $request->all();

            $data['slug'] = Helper::generateSlug($data['name'], Type::class);

            $type = Type::create($data);

            return redirect()->route('admin.types.index', compact('type'))->with('success', 'Tipo aggiunto correttamente');
        } else {
            return redirect()->route('admin.types.index')->with('error', 'Tipo già presente nel database');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request, Type $type)
    {
        $data = $request->all();

        $data['slug'] = Helper::generateSlug($data['name'], Type::class);

        $type->update($data);

        return redirect()->route('admin.types.index')->with('edit_confirm', 'Elemento aggiornato!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('delete_confirm', 'Elemento eliminato correttamente');
    }

    public function typeProjects()
    {
        $types = Type::all();

        return view('admin.types.typeProjects', compact('types'));
    }
}
