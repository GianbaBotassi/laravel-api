@extends('layouts.app')
@section('content')
    <h1 class="text-center py-2">{{ ucfirst($technology->name) }}</h1>
    <form class="container my-2" method="POST" action="{{ route('technology-update', $technology->id) }}">
        @csrf
        @method('put')
        <div class="d-flex flex-column align-items-center">
            <label for="name"><strong>Nome</strong></label>
            <input type="text" id="name" name="name" value="{{ $technology->name }}">
            <label for="description" class="mt-2"><strong>Descrizione</strong></label>
            <textarea style="height: 100px;width:450px" type="text" id="description" name="description">{{ $technology->description }}</textarea>

        </div>
        <div class="d-flex justify-content-center gap-4 mt-4">
            <button type="submit" class="btn btn-info py-2 px-2 text-light">Aggiorna progetto</button>
            <div class="text-center">
                <a class="btn btn-secondary py-2 px-2 text-light" href="{{ route('technology-showall') }}">Indietro</a>
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
