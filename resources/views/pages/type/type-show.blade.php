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
                        {{-- <a href=""> --}}
                        {{ ucfirst($project->name) }}
                        {{-- </a> --}}
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

        <form method="post" action="{{ route('type-destroy', $type->id) }}">

            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger py-2 px-2 text-light">Elimina</button>
        </form>
    </div>
@endsection
