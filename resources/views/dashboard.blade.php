@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Benvenuto {{ auth()->user()->name }}..</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="text-center offset-4 col-4">
                            Questo è il tuo pannello di amministrazione, da qua potrai inserire, modificare o eliminare
                            tipologie e tecnologie.
                        </p>
                        <div class="container d-flex justify-content-around py-4">
                            <a class="btn btn-info text-light" style="font-size: 2rem"
                                href="{{ route('type-showall') }}">Tipologie</a>
                            <button class="btn btn-info text-light" style="font-size: 2rem">Tecnologie</button>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
