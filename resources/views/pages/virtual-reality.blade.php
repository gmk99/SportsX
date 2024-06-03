@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Billing'])

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de Jogos</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Equipa Adversária</th>
                                <th>Data</th>
                                <th>Hora de início</th>
                                <th>Golos Marcados</th>
                                <th>Golos Sofridos</th>
                                <th>Hora de fim</th>
                                <th>Campo</th>
                                <th>Equipa</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($games as $game)
                                <tr>
                                    <td>{{ $game->OpposingTeam }}</td>
                                    <td>{{ $game->Date }}</td>
                                    <td>{{ $game->StartingTime }}</td>
                                    <td>{{ $game->GoalsScored }}</td>
                                    <td>{{ $game->GoalsConceded}}</td>
                                    <td>{{ $game->EndingTime}}</td>
                                    <td>{{ $game->FieldFieldID }}</td>
                                    <td>{{ $game->TeamID}}</td>
                                    <td>
                                        <a href="{{ url('game/' . $game->id) }}">View</a>
                                        <a href="{{ url('game/' . $game->id . '/edit') }}">Edit</a>
                                        <form action="{{ url('game/' . $game->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('game.create') }}">Create New Game</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth.footer')
@endsection
