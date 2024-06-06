@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Jogadores</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jogador</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Equipa</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Estado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Idade</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody id="players_table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Equipas</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome da equipa</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Escalão</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Número de jogadores</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Máximo de idade</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="team-table-body">
                                <!-- As equipas serão adicionadas aqui -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                    <script>
                        window.onload = function() {
                            axios.get('{{ route('api.team_names') }}')
                                .then(function(response) {
                                    console.log(response.data); // Log para verificar a resposta da API
                                    var teams = response.data;

                                    var tbody = document.querySelector('#team-table-body');
                                    tbody.innerHTML = ''; // Limpa o corpo da tabela

                                    teams.forEach(function(team) {
                                        var tr = document.createElement('tr');

                                        var tdName = document.createElement('td');
                                        tdName.textContent = team.Name;
                                        tr.appendChild(tdName);

                                        var tdEscalao = document.createElement('td');
                                        tdEscalao.textContent = team.LevelDesignation;
                                        tr.appendChild(tdEscalao);

                                        var tdNumJogadores = document.createElement('td');
                                        tdNumJogadores.textContent = team.NumberPlayers;
                                        tr.appendChild(tdNumJogadores);

                                        var tdMaxIdade = document.createElement('td');
                                        tdMaxIdade.textContent = team.MaximumAge;
                                        tr.appendChild(tdMaxIdade);

                                        tbody.appendChild(tr);
                                    });
                                })
                                .catch(function(error) {
                                    console.error('Erro ao obter os nomes das equipas:', error);
                                });
                        };
                    </script>
                    @include('layouts.footers.auth.footer')
                    @endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('/playerManagementData')
            .then(response => response.json())
            .then(data => {
                console.log(data); // Log the data to ensure it's being fetched correctly
                if (data.message) {
                    console.error(data.message);
                    return;
                }
                const players = data;
                const playersTable = document.getElementById('players_table');
                playersTable.innerHTML = ""; // Clear the table before appending
                players.forEach(player => {
                    const playerRow = `
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">${player.Name}</h6>
                                    <p class="text-xs text-secondary mb-0">${player.Position} | ${player.Number}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">${player.TeamName}</p>
                            <p class="text-xs text-secondary mb-0">${player.Level}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">${player.InjuryStatus}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">${player.Age} anos</span>
                        </td>
                        <td class="align-middle">
                            <a href="/players/${player.id}/edit" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                            </a>
                        </td>
                    </tr>
                `;
                    playersTable.innerHTML += playerRow;
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    });
</script>
