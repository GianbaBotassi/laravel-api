@extends('layouts.app')
@section('content')
    <div class="container my-3">

        <h1 class="text-center container">Tecnologie</h1>
        <ul class="text-center p-0">
            @foreach ($technologies as $technology)
                <li>
                    <a class="rounded list-hover px-2 py-1"
                        href="{{ route('technology-show', $technology->id) }}">{{ $technology->name }}</a>
                </li>
            @endforeach
        </ul>

        <div class="d-flex justify-content-center gap-4">
            <div class="text-center">
                <a class="btn btn-info py-2 px-2 text-light" href="{{ route('technology-create') }}">Crea
                    Tipologia</a>
            </div>
            {{-- Bottone per tornare a index --}}
            <div class="text-center">
                <a class="btn btn-secondary py-2 px-2 text-light" href="{{ route('dashboard') }}">Indietro</a>
            </div>
        </div>
    </div>
@endsection
