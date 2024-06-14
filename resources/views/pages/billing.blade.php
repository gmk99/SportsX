@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Billing'])

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Calendario</div>
                    <div class="card-body">
                        <div id="calendar" data-events-url="{{ route('calendar.events') }}"></div>
                        <div class="mt-3">
                            <button id="prevWeek" class="btn btn-primary">Semana Anterior</button>
                            <button id="nextWeek" class="btn btn-primary">Proxima Semana</button>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('game_create') }}" class="btn btn-success">Criar Novo Jogo</a>
                            <a href="{{ route('train_create') }}" class="btn btn-success">Criar Novo Treino</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth.footer')

    <style>
        #calendar {
            width: 100%;
            height: 700px; /* Adjust this height as needed */
        }
    </style>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
@endsection
