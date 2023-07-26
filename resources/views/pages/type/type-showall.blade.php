@extends('layouts.app')
@section('content')
    <div class="container my-3">

        <h1 class="text-center container">Tipologie</h1>
        <ul class="text-center p-0">
            @foreach ($types as $type)
                <li class="my-2">
                    <a class="rounded list-hover px-2 py-1" href="{{ route('type-show', $type->id) }}">{{ $type->name }}</a>
                </li>
            @endforeach
        </ul>

        <div class="d-flex justify-content-center gap-4">
            <div class="text-center">
                <a class="btn btn-info py-2 px-2 text-light" href="{{ route('type-create') }}">Crea
                    Tipologia</a>
            </div>
            {{-- Bottone per tornare a index --}}
            <div class="text-center">
                <a class="btn btn-secondary py-2 px-2 text-light" href="{{ route('dashboard') }}">Indietro</a>
            </div>
        </div>
    </div>
@endsection
