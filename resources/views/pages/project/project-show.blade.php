@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <div class="text-center">Titolo Progetto:</div>
        <h1 class="text-center container">{{ ucfirst($projects->name) }}</h1>
        <div class="row justify-content-between py-4">
            <span class="offset-4 col-3"><strong>Descrizione:</strong></span>
            <span class="col-5">{{ $projects->description }}</span>
        </div>
        <div class="row justify-content-between py-4">
            <span class="offset-4 col-3"><strong>Numero collaboratori:</strong></span>
            <span class="col-5">{{ $projects->collaborators }}</span>
        </div>
        <div class="row justify-content-between">
            <span class="offset-4 col-3"><strong>Visibilità:</strong></span>
            <span class="col-5">{{ $projects->private ? 'Privato' : 'Pubblico' }}</span>
        </div>
        <div class="row justify-content-between py-4">
            <span class="offset-4 col-3"><strong>Tipologia:</strong></span>
            <div class="col-5">
                <a href="{{ route('type-show', $projects->type->id) }}"
                    class="btn btn-secondary text-white d-inline ">{{ $projects->type->name }}</a>
            </div>
        </div>
        <div class="row justify-content-between py-4">
            <span class="offset-4 col-3"><strong>Tecnologie:</strong></span>
            <span class="col-5">
                @foreach ($projects->technologies as $item)
                    {{ $item->name }}
                    {{-- Condizione di laravel blade per selezionare ultimo loop --}}
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </span>
        </div>
    </div>
    {{-- Bottone per edit --}}
    <div class="text-center">
        <a class="btn btn-warning py-1 px-3 mx-3" href="{{ route('project-edit', $projects->id) }}">Edit</a>
    </div>
    {{-- Bottone per tornare a index --}}
    <div class="text-center pt-3">
        <a class="rounded bg-secondary py-1 px-2 text-light" href="{{ route('index') }}">Indietro</a>
    </div>
@endsection
