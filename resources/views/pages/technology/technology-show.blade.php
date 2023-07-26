@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <h5 class="text-center">Tecnologia:</h5>
        <h1 class="text-center">{{ ucfirst($technology->name) }}</h1>
        <div class="row justify-content-between py-4">
            <span class="offset-3 col-2"><strong>Nome Tecnologia:</strong></span>
            <span class="col-6">{{ $technology->name }}</span>
        </div>
        <div class="row justify-content-between py-4">
            <span class="offset-3 col-2"><strong>Descrizione:</strong></span>
            <span class="col-6">{{ $technology->description }}</span>
        </div>
        <div class="row justify-content-between py-4">
            <span class="offset-3 col-2"><strong>Progetti collegati:</strong></span>
            <ul class="col-6">
                @foreach ($technology->projects as $project)
                    <li class="list-styled">
                        <a href="{{ route('project-show', $project->id) }}">
                            {{ ucfirst($project->name) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>


    </div>
    <div class="d-flex justify-content-center gap-4">
        {{-- Bottone per tornare a technology-showall --}}
        <div class="text-center">
            <a class="btn btn-secondary py-2 px-2 text-light" href="{{ route('technology-showall') }}">Indietro</a>
        </div>
        {{-- Bottone edit --}}
        <div class="text-center">
            <a class="btn btn-warning py-2 px-2 text-light" href="{{ route('technology-edit', $technology->id) }}">Edit</a>
        </div>

        {{-- Bottone che richiama la modale --}}
        <button class="btn btn-danger py-1 px-1 text-decoration-none text-white" technology="button" class="btn btn-primary"
            data-toggle="modal" data-target="#modaldelete">
            Elimina
        </button>

        {{-- Modale  --}}
        <form method="POST" action="{{ route('technology-destroy', $technology->id) }}">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <h4>Eliminazione Tecnologia</h4>
                            <p>Sei sicuro di voler eliminare questa tecnologia?</p>
                        </div>
                        <div class="modal-footer">

                            {{-- Bottone per eliminare --}}

                            <button class="btn btn-danger py-1 px-1 text-decoration-none text-white">Conferma</button>
        </form>
        <button technology="button" class="btn btn-secondary" data-dismiss="modal">Indietro</button>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
