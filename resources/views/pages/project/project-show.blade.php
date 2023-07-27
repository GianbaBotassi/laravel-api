@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <div class="text-center">Titolo Progetto:</div>
        <h1 class="text-center container">{{ ucfirst($projects->name) }}</h1>
        <div class="row justify-content-between align-items-center py-4">
            <span class="offset-2 col-3"><strong>Descrizione:</strong></span>
            <span class="col-6">{{ $projects->description }}</span>
        </div>
        <div class="row justify-content-between align-items-center py-4">
            <span class="offset-2 col-3"><strong>Numero collaboratori:</strong></span>
            <span class="col-6">{{ $projects->collaborators }}</span>
        </div>
        <div class="row justify-content-between align-items-center">
            <span class="offset-2 col-3"><strong>Visibilità:</strong></span>
            <span class="col-6">{{ $projects->private ? 'Privato' : 'Pubblico' }}</span>
        </div>
        <div class="row justify-content-between align-items-center py-4">
            <span class="offset-2 col-3"><strong>Tipologia:</strong></span>
            <div class="col-6">
                <a href="{{ route('type-show', $projects->type->id) }}"
                    class="btn btn-secondary text-white d-inline ">{{ $projects->type->name }}</a>
            </div>
        </div>
        <div class="row justify-content-between align-items-center py-4">
            <span class="offset-2 col-3"><strong>Tecnologie:</strong></span>
            @if (count($projects->technologies))
                <span class="col-6">
                    @foreach ($projects->technologies as $technology)
                        <a href="{{ route('technology-show', $technology->id) }}"
                            class="btn btn-info px-2 py-1 d-inline-block me-1 text-light">
                            {{ $technology->name }}
                        </a>
                        {{-- Nel caso posso usare condizione di laravel blade per selezionare ultimo loop --}}
                        {{-- @if (!$loop->last)
                    ,
                    @endif --}}
                    @endforeach
                @else
                    <span class="col-6">Non sono associate tecnologie.</span>
            @endif
            </span>
        </div>
    </div>
    <div class="d-flex justify-content-center gap-4">
        {{-- Bottone per tornare a index --}}
        <div class="text-center">
            <a class="btn btn-secondary py-1 px-2 text-light" href="{{ route('index') }}">Indietro</a>
        </div>
        {{-- Bottone per edit --}}
        <div class="text-center">
            <a class="btn btn-warning py-1 px-3" href="{{ route('project-edit', $projects->id) }}">Edit</a>
        </div>
        {{-- Bottone che richiama la modale --}}
        <button class="btn btn-danger py-1 px-1 text-decoration-none text-white" type="button" class="btn btn-primary"
            data-toggle="modal" data-target="#modaldelete">
            Elimina
        </button>

        {{-- Modale  --}}
        <form method="POST" action="{{ route('project-destroy', $projects->id) }}">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <h4>Eliminazione progetto</h4>
                            <p>Vuoi eliminare il progetto selezionato?</p>
                        </div>
                        <div class="modal-footer">

                            {{-- Bottone per eliminare --}}

                            <button class="btn btn-danger py-1 px-1 text-decoration-none text-white">Conferma</button>
        </form>
    </div>
@endsection
