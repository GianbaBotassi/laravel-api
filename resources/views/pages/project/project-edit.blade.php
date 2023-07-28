@extends('layouts.app')
@section('content')
    @csrf
    @method('put')
    <h1 class="text-center py-2">{{ ucfirst($project->name) }}</h1>
    <form class="container my-2" method="POST" action="{{ route('project-update', $project->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="d-flex flex-column align-items-center">
            <div class="d-flex justify-content-between gap-4">
                <div>
                    <label for="name"><strong>Nome</strong></label>
                    <input type="text" id="name" name="name" value="{{ $project->name }}">
                </div>
                <div class="d-flex align-items-start gap-2">
                    <label for="description"><strong>Descrizione:</strong></label>
                    <textarea style="height: 100px;width:250px" type="text" id="description" name="description">{{ $project->description }}</textarea>
                </div>
            </div>
            <div class="my-3">
                <label class="form-label me-3"><strong>Visibilità:</strong></label>
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
            <div class="d-flex justify-content-between gap-4 align-items-center">
                <div>
                    <label for="collaborators"><strong>Collaboratori</strong></label>
                    <input type="text" id="collaborators" name="collaborators" value="{{ $project->collaborators }}">
                </div>
                <div>
                    <label for="tipologia">Tipologia</label>
                    <select name="type_id" id="type_id">

                        {{-- Condizione if per riportare la tipologia attuale --}}
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected($project->type->id == $type->id)>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="py-2" style="overflow: hidden;width:100px;height:100px">
                @if ($project->user_picture)
                    <img src="{{ asset('storage/' . $project->user_picture) }}" width="100%" height="100%"
                        style="object-fit: cover;border-radius:10px">
                @else
                    <img src="{{ asset('storage/images/default.jpg') }}" width="100%" height="100%"
                        style="object-fit: cover;border-radius:10px">
                @endif
            </div>
            <label class="my-2" for="user_picture"><strong>Carica la tua immagine profilo</strong></label>
            <input type="file" name="user_picture" id="user_picture">

            <label class="my-2"><strong>Tecnologie:</strong></label>

            {{-- Ciclo tutte le tecnologie --}}
            @foreach ($technologies as $technology)
                <div>
                    <label for="technology{{ $technology->id }}">{{ $technology->name }}</label>
                    <input type="checkbox" name="technology[]" id="technology{{ $technology->id }}"
                        value="{{ $technology->id }}" {{-- Ciclo tutte le tecnologie del progetto, metto una condizione if per dare il check --}}
                        @foreach ($project->technologies as $subTechnology)
                            @checked ($subTechnology->id == $technology->id) @endforeach>

                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center gap-4 mt-3">

            <button type="submit" class="btn btn-primary">Aggiorna progetto</button>

            <div class="text-center">
                <a class="btn btn-secondary text-light" href="{{ route('index') }}">Indietro</a>
            </div>
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
