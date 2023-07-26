@extends('layouts.app')
@section('content')
    <form class="container my-2" method="POST" action="{{ route('project-store') }}">
        @csrf
        @method('POST')

        <div class="d-flex flex-column align-items-center">
            <h1 class="py-2">Nuovo progetto</h1>
            <div class="d-flex justify-content-between gap-4">
                <div>
                    <label for="name"><strong>Nome</strong></label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="d-flex align-items-start gap-2">
                    <label for="description"><strong>Descrizione:</strong></label>
                    <textarea style="height: 60px" type="text" id="description" name="description"></textarea>
                </div>
            </div>
            <div class="my-3">
                <label class="form-label me-3"><strong>Visibilità:</strong></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" checked name="private" value="0" id="public">
                    <label class="form-check-label" for="public">Pubblico</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private" value="1" id="private">
                    <label class="form-check-label" for="private">Privato</label>
                </div>
            </div>
            <div class="d-flex justify-content-between gap-4">

                <div>
                    <label for="collaborators"><strong>Collaboratori</strong></label>
                    <input type="text" id="collaborators" name="collaborators">
                </div>
                <div>
                    <label class="my-2" for="tipologia"><strong>Tipologia</strong></label>
                    <select class="my-2" name="type_id" id="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <label class="my-2"><strong>Tecnologie:</strong></label>
            @foreach ($technologies as $technology)
                <div>
                    <label for="technology{{ $technology->id }}">{{ $technology->name }}</label>
                    <input type="checkbox" name="technology[]" id="technology{{ $technology->id }}"
                        value="{{ $technology->id }}">
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center gap-4 mt-3">
            <button type="submit" class="btn btn-primary">Crea progetto</button>
            {{-- Bottone per tornare a index --}}
            <div class="text-center pt-1">
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
