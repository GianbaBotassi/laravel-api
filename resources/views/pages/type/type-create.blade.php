@extends('layouts.app')
@section('content')
    <form class="container my-2" method="POST" action="{{ route('type-store') }}">
        @csrf
        @method('POST')

        <div class="d-flex flex-column align-items-center">
            <h1 class="py-2">Nuova Tipologia</h1>
            <label for="name"><strong>Nome</strong></label>
            <input type="text" id="name" name="name">
            <label for="description"><strong>Descrizione</strong></label>
            <textarea type="text" style="height: 100px;width:450px" id="description" name="description"></textarea>

            <button type="submit" class="btn btn-primary mt-3 mb-2">Crea Tipologia</button>
        </div>
        {{-- Bottone per tornare a index --}}
        <div class="text-center py-3">
            <a class="rounded bg-secondary py-1 px-2 text-light" href="{{ route('type-showall') }}">Indietro</a>
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
