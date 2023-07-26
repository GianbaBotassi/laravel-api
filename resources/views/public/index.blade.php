@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="d-inline-block mt-2 py-1" style="font-size: 4rem">Portfolio</h1>
            <div class="mt-4">
                <ul class="p-0" style="width: 600px">
                    @foreach ($projects as $project)
                        <li class="list-unstyled my-2 d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none py-1 px-3 text-dark me-auto" style="font-size: 1.2rem"
                                href="{{ route('show', $project->id) }}">
                                {{ ucfirst($project->name) }}
                            </a>
                            {{-- Bottone per edit --}}
                            <div>
                                <a class="btn btn-warning py-1 px-1 mx-3 text-decoration-none text-dark"
                                    style="font-size: 0.7rem" href="{{ route('edit', $project->id) }}">Edit</a>
                            </div>
                            {{-- Bottone per eliminare progetto --}}
                            <form method="post" action="{{ route('destroy', $project->id) }}">

                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger py-1 px-1 text-decoration-none text-white"
                                    style="font-size: 0.7rem">Elimina</button>
                            </form>
                        </li>
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
