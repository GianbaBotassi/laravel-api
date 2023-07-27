@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="d-inline-block mt-2 py-1" style="font-size: 4rem">Portfolio</h1>
            <div class="mt-2">
                <ul class="p-0">
                    @foreach ($projects as $project)
                        <li class="py-2">
                            <a class="py-3 px-3 me-auto rounded list-hover" style="font-size: 1.2rem"
                                href="{{ route('project-show', $project->id) }}">--
                                {{ ucfirst($project->name) }}
                                --</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center my-4">
        <a class="rounded bg-secondary py-2 px-4 text-light" href="{{ route('project-create') }}">Crea
            nuovo progetto</a>
    </div>
@endsection
