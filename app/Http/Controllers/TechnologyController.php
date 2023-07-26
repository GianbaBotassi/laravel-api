<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Technology;

class TechnologyController extends Controller
{
    public function showall()
    {

        $technologies = Technology::all();

        return view('pages/technology/technology-showall', compact('technologies'));
    }

    public function create()
    {

        return view('pages/technology/technology-create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $technology = Technology::create($data);

        return redirect()->route('technology-show', $technology->id);
    }


    public function show($id)
    {
        $technology = Technology::findOrFail($id);


        return view('pages/technology/technology-show', compact('technology'));
    }

    public function edit($id)
    {

        $technology = Technology::findOrFail($id);

        return view('pages/technology/technology-edit', compact('technology'));
    }

    public function update(Request $request, $id)
    {
        $data = $request
            ->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

        $technology = technology::findOrFail($id);

        $technology->update($data);

        return redirect()->route('technology-show', $technology->id);
    }

    public function destroy(Request $request, $id)
    {
        $technology = Technology::findOrFail($id);

        $technology->projects()->detach();


        $technology->delete();

        return redirect()->route('technology-showall');
    }
}
