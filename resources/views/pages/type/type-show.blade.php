@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <h5 class="text-center">Tipologia:</h5>
        <h1 class="text-center">{{ ucfirst($type->name) }}</h1>
        <div class="row justify-content-between py-4">
            <span class="offset-3 col-2"><strong>Nome Tipologia:</strong></span>
            <span class="col-6">{{ $type->name }}</span>
        </div>
        <div class="row justify-content-between py-4">
            <span class="offset-3 col-2"><strong>Descrizione:</strong></span>
            <span class="col-6">{{ $type->description }}</span>
        </div>
        <div class="row justify-content-between py-4">
            <span class="offset-3 col-2"><strong>Progetti collegati:</strong></span>
            <ul class="col-6">
                @foreach ($type->projects as $project)
                    <li class="list-styled">
                        <a class="list-hover rounded px-2 py-1" href="{{ route('project-show', $project->id) }}">
                            {{ ucfirst($project->name) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>


    </div>
    <div class="d-flex justify-content-center gap-4">
        {{-- Bottone per tornare a type-showall --}}
        <div class="text-center">
            <a class="btn btn-secondary py-2 px-2 text-light" href="{{ route('type-showall') }}">Indietro</a>
        </div>
        {{-- Bottone edit --}}
        <div class="text-center">
            <a class="btn btn-warning py-2 px-2 text-light" href="{{ route('type-edit', $type->id) }}">Edit</a>
        </div>

        {{-- Bottone che richiama la modale --}}
        <button class="btn btn-danger py-1 px-1 text-decoration-none text-white" type="button" class="btn btn-primary"
            data-toggle="modal" data-target="#modaldelete">
            Elimina
        </button>

        {{-- Modale  --}}
        <form method="POST" action="{{ route('type-destroy', $type->id) }}">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <h4>Eliminazione tipologia</h4>
                            <p>
                                Se vuoi eliminare questo elemento devi riassegnare una tipologia ai progetti collegati.
                            </p>
                        </div>
                        <div class="modal-body">
                            <label for="type_id">Seleziona la tipologia da assegnare: </label>
                            <select name="type_id" id="type_id">
                                @foreach ($types as $subtype)
                                    <option value="{{ $subtype->id }}" @disabled($subtype->id == $type->id)>{{ $subtype->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">

                            {{-- Bottone per eliminare --}}

                            <button class="btn btn-danger py-1 px-1 text-decoration-none text-white">Conferma</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Indietro</button>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
