<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

use Illuminate\Http\Request;

class ProjectController extends Controller
{

    // Funzione che mostra i dettagli del progetto
    public function show($id)
    {

        $projects = Project::findOrFail($id);

        return view('pages.project.project-show', compact('projects'));
    }

    // Funzione per reindirizzamento a pagina create
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();


        return view('pages.project.project-create', compact('types', 'technologies'));
    }

    // Funzione per creare nuovo progetto con validazioni basic
    public function store(Request $request)
    {

        // dd($request->all());
        $data = $request
            ->validate([
                'name' => 'required',
                'description' => 'required',
                'private' => 'required',
                'collaborators' => 'required',
                'type_id' => 'required|integer',
                'technology' => 'nullable|array'
            ]);

        $project = Project::create($data);


        $project->technologies()->attach($data['technology']);

        return redirect()->route('project-show', $project->id);
    }

    // Funzione per reindirizzamento a pagina edit
    public function edit($id)
    {
        $types = Type::all();
        $technologies = Technology::all();

        $project = Project::findOrFail($id);

        return view('pages.project.project-edit', compact('project', 'types', 'technologies'));
    }

    // Funzione per update progetto esistente
    public function update(Request $request, $id)
    {
        $data = $request
            ->validate([
                'name' => 'required',
                'description' => 'required',
                'private' => 'required',
                'collaborators' => 'required',
                'type_id' => 'required',
                'technology' => 'nullable|array'
            ]);

        $project = Project::findOrFail($id);

        $project->technologies()->sync($data['technology']);

        $project->update($data);

        return redirect()->route('project-show', $project->id);
    }

    // Funzione per eliminare progetto
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()->route('index');
    }
}
