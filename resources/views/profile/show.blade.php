@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <div class="text-center">Titolo Progetto:</div>
        <h1 class="text-center container">{{ ucfirst($projects->name) }}</h1>
        <div class="row justify-content-between py-4">
            <span class="col-2"><strong>Descrizione:</strong></span>
            <span class="offset-4 col-6">{{ $projects->description }}</span>
        </div>
        <div class="row justify-content-between py-4">
            <span class="col-2"><strong>Numero collaboratori:</strong></span>
            <span class="offset-4 col-6">{{ $projects->collaborators }}</span>
        </div>
        <div class="row justify-content-between">
            <span class="col-2"><strong>Visibilità:</strong></span>
            <span class="offset-4 col-6">{{ $projects->private ? 'Privato' : 'Pubblico' }}</span>
        </div>
        <div class="row justify-content-between py-4">
            <span class="col-2"><strong>Tipologia:</strong></span>
            <span class="offset-4 col-6">{{ $projects->type->name }}</span>
        </div>
        <div class="row justify-content-between py-4">
            <span class="col-2"><strong>Tecnologie:</strong></span>
            <span class="offset-4 col-6">
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
        <a class="btn btn-warning py-1 px-3 mx-3 text-decoration-none" href="{{ route('edit', $projects->id) }}">Edit</a>
    </div>
    {{-- Bottone per tornare a index --}}
    <div class="text-center pt-3">
        <a class="rounded bg-secondary py-1 px-2 text-decoration-none text-light" href="{{ route('index') }}">Indietro</a>
    </div>
@endsection
