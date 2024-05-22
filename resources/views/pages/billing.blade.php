@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Billing'])
            <!DOCTYPE html>
        <html lang="pt-PT">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lista de Jogos Formatada</title>
            <style>
                table {
                    font-family: Arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                table th, table td {
                    border: 1px solid #ddd;
                    padding: 8px;
                }

                table th {
                    text-align: left;
                    background-color: #f0f0f0;
                }
            </style>
        </head>
        <body>
        <h1>Lista de Jogos Formatada</h1>

        <table id="gamesTable">
            <thead>
            <tr>
                <th>ID Jogo</th>
                <th>Equipa Oponente</th>
                <th>Golos Sofridos</th>
                <th>Golos Marcados</th>
                <th>Equipa da Casa</th>
                <th>Em Casa</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $.getJSON('/api/games-formatted', function(data) {
                    var gamesData = data;

                    if (gamesData.length > 0) {
                        for (var i = 0; i < gamesData.length; i++) {
                            var game = gamesData[i];

                            var row = $('<tr>');
                            row.append('<td>' + game.gameId + '</td>');
                            row.append('<td>' + game.opposingTeam + '</td>');
                            row.append('<td>' + game.goalsConceded + '</td>');
                            row.append('<td>' + game.goalsScored + '</td>');
                            row.append('<td>' + game.homeTeamName + '</td>');
                            row.append('<td>' + game.isAtHome + '</td>');

                            $('#gamesTable tbody').append(row);
                        }
                    } else {
                        $('#gamesTable tbody').append('<tr><td colspan="6">Não foram encontrados jogos.</td></tr>');
                    }
                });
            });
        </script>
        </body>
        </html>
    @include('layouts.footers.auth.footer')
@endsection
