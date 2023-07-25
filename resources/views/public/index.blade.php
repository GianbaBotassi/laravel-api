@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="mt-2 py-1 text-white rounded bg-secondary">Portfolio</h1>
            <div class="mt-4">
                <ul class="p-0">
                    @foreach ($projects as $project)
                        <li class="list-unstyled my-4">
                            <a class="text-decoration-none py-1 px-3 text-white rounded bg-primary"
                                href="{{ route('show', $project->id) }}">
                                {{ ucfirst($project->name) }}
                            </a>
                            {{-- Bottone per edit --}}
                            <span>
                                <a class="btn btn-warning py-1 px-1 mx-3 text-decoration-none text-dark"
                                    style="font-size: 0.7rem" href="{{ route('edit', $project->id) }}">Edit</a>
                            </span>
                        </li>

                        {{-- Bottone per modale in cui richiamo come data-target la variabile contenente l'id --}}
                        {{-- <button class="btn btn-danger py-1 px-1 text-decoration-none text-white" style="font-size: 0.7rem"
                            type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $modalId }}">
                            Elimina
                        </button> --}}
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center my-4">
        <a class="rounded bg-secondary py-1 px-2 text-light text-decoration-none" href="{{ route('create') }}">Crea
            nuovo progetto</a>
    </div>
@endsection
