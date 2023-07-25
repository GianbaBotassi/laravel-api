<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;

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

        return view('profile.create', compact('types'));
    }

    // Funzione per creare nuovo progetto con validazioni basic
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'private' => 'required',
            'collaborators' => 'required',
            'type_id' => 'required'
        ]);

        $project = Project::create($data);

        return redirect()->route('show', $project->id);
    }
    public function edit($id)
    {
        $types = Type::all();
        $project = Project::findOrFail($id);

        return view('profile.edit', compact('project', 'types'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'private' => 'required',
            'collaborators' => 'required',
            'type_id' => 'required'
        ]);

        $project = Project::findOrFail($id);

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
