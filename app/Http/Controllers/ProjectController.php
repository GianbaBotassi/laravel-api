<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Mail\MailProjectCreated;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate($this->getValidation());

        // Se è stata messa foto nel form allora la aggiungo fisicamente allo storage
        if (array_key_exists('user_picture', $data)) {
            $data['user_picture'] = Storage::put('uploads', $data['user_picture']);
        }

        $project = Project::create($data);

        // Se sono state indicate tecnologie nella checkbox allora le collego tabella ponte
        if (array_key_exists('technology', $data))
            $project->technologies()->attach($data['technology']);

        // Invio una mail all'admin e una all'utente loggato
        Mail::to('amministrazione@project.com')->send(new MailProjectCreated($project));
        Mail::to(Auth::user()->email)->send(new MailProjectCreated($project));

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
        $data = $request->validate($this->getValidation());

        $project = Project::findOrFail($id);

        // Se non è stata inserita una foto si reinserisce nei data la voto vecchia
        if (!array_key_exists('user_picture', $data)) {
            $data['user_picture'] = $project->user_picture;
        } else {

            // Se la foto progetto esiste, la elimino dallo storage
            if ($project->user_picture) {

                Storage::delete($project->user_picture);
            }
            // In ogni caso poi viene inserita la nuova
            $data['user_picture'] = Storage::put('uploads', $data['user_picture']);
        }

        $project->update($data);

        // Condizione se l'array tecnologie non è vuoto

        // Opzione 1
        // if (array_key_exists('technology', $data))
        //     $project->technologies()->sync($data['technology']);
        // else
        //     $project->technologies()->detach();

        // Opzione 2 con operatore ternario
        $project->technologies()->sync(
            array_key_exists('technology', $data)
                ? $data['technology']
                : []
        );

        return redirect()->route('project-show', $project->id);
    }

    // Funzione per eliminare progetto
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Elimino i collegamenti con la tabella ponte
        $project->technologies()->detach();

        $project->delete();

        return redirect()->route('index');
    }

    // Funzione per eliminare user_picture
    public function destroyPicture($id)
    {
        $project = Project::findOrFail($id);

        // Se esiste la foto la elimino fisicamente
        if ($project->user_picture) {

            Storage::delete($project->user_picture);
        }

        // La elimino dal db
        $project->user_picture = null;
        $project->save();

        return redirect()->route('project-show', $project->id);
    }

    // Funzione per validazioni
    private function getValidation()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'private' => 'required',
            'collaborators' => 'required',
            'type_id' => 'required|integer',
            'technology' => 'nullable|array',
            'user_picture' => 'nullable|max:2048'
        ];
    }
}
