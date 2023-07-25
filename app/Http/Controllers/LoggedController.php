<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class LoggedController extends Controller
{
    public function show($id)
    {

        $projects = Project::findOrFail($id);

        return view('profile.show', compact('projects'));
    }
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();


        return view('profile.create', compact('types', 'technologies'));
    }

    // Funzione per creare nuovo progetto con validazioni basic
    public function store(Request $request)
    {
        $data = $request->all();
        // ->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'private' => 'required',
        //     'collaborators' => 'required',
        //     'type_id' => 'required'
        // ]);

        $project = Project::create($data);


        $project->technologies()->attach($data['technology']);

        return redirect()->route('show', $project->id);
    }
    public function edit($id)
    {
        $types = Type::all();
        $technologies = Technology::all();

        $project = Project::findOrFail($id);

        return view('profile.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        // ->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'private' => 'required',
        //     'collaborators' => 'required',
        //     'type_id' => 'required'
        // ]);

        $project = Project::findOrFail($id);

        $project->technologies()->sync($data['technology']);

        $project->update($data);

        return redirect()->route('show', $project->id);
    }

    // Funzione per eliminare elemento
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()->route('index');
    }
}
