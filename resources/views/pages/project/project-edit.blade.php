@extends('layouts.app')
@section('content')

    <form class="container my-2" method="POST" action="{{ route('project-update', $project->id) }}">
        @csrf
        @method('put')
        <div class="d-flex flex-column align-items-center">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" value="{{ $project->name }}">
            <label for="description">Descrizione</label>
            <input type="text" id="description" name="description" value="{{ $project->description }}">
            <div class="my-3">
                <label class="form-label me-3">Visibilità:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" {{ $project->private === 0 ? 'checked' : '' }}
                        name="private" value="0" id="public">
                    <label class="form-check-label" for="public">Pubblico</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" {{ $project->private === 1 ? 'checked' : '' }}
                        name="private" value="1" id="private">
                    <label class="form-check-label" for="private">Privato</label>
                </div>
            </div>

            <label for="collaborators">Collaboratori</label>
            <input type="text" id="collaborators" name="collaborators" value="{{ $project->collaborators }}">
            <label class="my-2" for="tipologia">Tipologia</label>
            <select class="my-2" name="type_id" id="type_id">

                {{-- Condizione if per riportare la tipologia attuale --}}
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @selected($project->type->id == $type->id)>
                        {{ $type->name }}</option>
                @endforeach
            </select>
            <label class="my-2"><strong>Tecnologie:</strong></label>

            {{-- Ciclo tutte le tecnologie --}}
            @foreach ($technologies as $technology)
                <div>
                    <label for="technology-id">{{ $technology->name }}</label>
                    <input type="checkbox" name="technology[]" id="technology-id" value="{{ $technology->id }}"
                        {{-- Ciclo tutte le tecnologie del progetto, metto una condizione if per dare il check --}}
                        @foreach ($project->technologies as $subTechnology)
                            @checked ($subTechnology->id == $technology->id) @endforeach>

                </div>
            @endforeach
            <button type="submit" class="btn btn-primary my-4">Aggiorna progetto</button>
        </div>
        <div class="text-center pt-3">
            <a class="rounded bg-secondary py-1 px-2 text-light" href="{{ route('index') }}">Indietro</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

@endsection
