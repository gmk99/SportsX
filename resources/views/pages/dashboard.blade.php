
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total de Atletas do Clube</p>
                                    <h5 class="font-weight-bolder">
                                        <h5 id="totalPlayers" class="font-weight-bolder"></h5>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Atletas Lesionados</p>
                                    <h5 class="font-weight-bolder">
                                        <h5 id="totalInjuries" class="font-weight-bolder"></h5>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total de equipas</p>
                                    <h5 class="font-weight-bolder">
                                        <h5 id="totalTeams" class="font-weight-bolder"></h5>                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total de treinadores</p>
                                    <h5 id="totalCoaches" class="font-weight-bolder"></h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Jogadores por escalão</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active" style="background-image: url('./img/carousel-1.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Get started with Argon</h5>
                                    <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('./img/carousel-2.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Faster way to create web pages</h5>
                                    <p>That’s my skill. I’m not really specifically talented at anything except for the
                                        ability to learn.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('./img/carousel-3.jpg');
            background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-trophy text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Share with us your design tips!</h5>
                                    <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Top 5 Melhores Marcadores</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Nome:</p>
                                                <h6 id="topScorerName" class="text-sm mb-0"></h6>
                                                <h6 id="secondTopScorerName" class="text-sm mb-0"></h6>
                                                <h6 id="thirdTopScorerName" class="text-sm mb-0"></h6>
                                                <h6 id="forthTopScorerName" class="text-sm mb-0"></h6>
                                                <h6 id="fifthTopScorerName" class="text-sm mb-0"></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Numero:</p>
                                            <h6 id="topScorerNumber" class="text-sm mb-0"></h6>
                                            <h6 id="secondTopScorerNumber" class="text-sm mb-0"></h6>
                                            <h6 id="thirdTopScorerNumber" class="text-sm mb-0"></h6>
                                            <h6 id="forthTopScorerNumber" class="text-sm mb-0"></h6>
                                            <h6 id="fifthTopScorerNumber" class="text-sm mb-0"></h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Posição:</p>
                                            <h6 id="topScorerPosition" class="text-sm mb-0"></h6>
                                            <h6 id="secondTopScorerPosition" class="text-sm mb-0"></h6>
                                            <h6 id="thirdTopScorerPosition" class="text-sm mb-0"></h6>
                                            <h6 id="forthTopScorerPosition" class="text-sm mb-0"></h6>
                                            <h6 id="fifthTopScorerPosition" class="text-sm mb-0"></h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Golos:</p>
                                            <h6 id="topScorerGoals" class="text-sm mb-0"></h6>
                                            <h6 id="secondTopScorerGoals" class="text-sm mb-0"></h6>
                                            <h6 id="thirdTopScorerGoals" class="text-sm mb-0"></h6>
                                            <h6 id="forthTopScorerGoals" class="text-sm mb-0"></h6>
                                            <h6 id="fifthTopScorerGoals" class="text-sm mb-0"></h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-mobile-button text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                        <span class="text-xs">250 in stock, <span class="font-weight-bold">346+
                                                sold</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-tag text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                        <span class="text-xs">123 closed, <span class="font-weight-bold">15
                                                open</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-box-2 text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                        <span class="text-xs">1 is active, <span class="font-weight-bold">40
                                                closed</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-satisfied text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                        <span class="text-xs font-weight-bold">+ 430</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        function fetchDataAndDrawChart() {
            $.ajax({
                url: '{{ route("totalPlayersInIniciacao") }}',
                method: 'GET',
                success: function(data) {
                    chart.data.datasets[0].data[0] = data.totalPlayers;
                    chart.update();
                }
            });

            $.ajax({
                url: '{{ route("totalPlayersInPetizes") }}',
                method: 'GET',
                success: function(data) {
                    chart.data.datasets[0].data[1] = data.totalPlayers;
                    chart.update();
                }
            });

            $.ajax({
                url: '{{ route("totalPlayersInTraquinas") }}',
                method: 'GET',
                success: function(data) {
                    chart.data.datasets[0].data[2] = data.totalPlayers;
                    chart.update();
                }
            });

            $.ajax({
                url: '{{ route("totalPlayersInBenjamins") }}',
                method: 'GET',
                success: function(data) {
                    chart.data.datasets[0].data[3] = data.totalPlayers;
                    chart.update();
                }
            });

            $.ajax({
                url: '{{ route("totalPlayersInInfantis") }}',
                method: 'GET',
                success: function(data) {
                    chart.data.datasets[0].data[4] = data.totalPlayers;
                    chart.update();
                }
            });

            $.ajax({
                url: '{{ route("totalPlayersInIniciados") }}',
                method: 'GET',
                success: function(data) {
                    chart.data.datasets[0].data[5] = data.totalPlayers;
                    chart.update();
                }
            });

            $.ajax({
                url: '{{ route("totalPlayersInJuvenis") }}',
                method: 'GET',
                success: function(data) {
                    chart.data.datasets[0].data[6] = data.totalPlayers;
                    chart.update();
                }
            });

            $.ajax({
                url: '{{ route("totalPlayersInJuniores") }}',
                method: 'GET',
                success: function(data) {
                    chart.data.datasets[0].data[7] = data.totalPlayers;
                    chart.update();
                }
            });

            $.ajax({
                url: '{{ route("totalPlayersInSeniores") }}',
                method: 'GET',
                success: function(data) {
                    chart.data.datasets[0].data[8] = data.totalPlayers;
                    chart.update();
                }
            });
        }

        $(document).ready(function() {
            $.ajax({
                url: '{{ route("totalCoaches") }}',
                method: 'GET',
                success: function(response) {
                    $('#totalCoaches').text(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '{{ route("totalPlayers") }}',
                method: 'GET',
                success: function(response) {
                    $('#totalPlayers').text(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '{{ route("totalTeams") }}',
                method: 'GET',
                success: function(response) {
                    $('#totalTeams').text(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '{{ route("totalInjuries") }}',
                method: 'GET',
                success: function(response) {
                    $('#totalInjuries').text(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '{{ route("topScorer") }}',
                method: 'GET',
                success: function(response) {
                    $('#topScorerName').text(response.Name);
                    $('#topScorerNumber').text(response.Number);
                    $('#topScorerPosition').text(response.Position);
                    $('#topScorerGoals').text(response.Goals);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '{{ route("secondTopScorer") }}',
                method: 'GET',
                success: function(response) {
                    $('#secondTopScorerName').text(response.Name);
                    $('#secondTopScorerNumber').text(response.Number);
                    $('#secondTopScorerPosition').text(response.Position);
                    $('#secondTopScorerGoals').text(response.Goals);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '{{ route("thirdTopScorer") }}',
                method: 'GET',
                success: function(response) {
                    $('#thirdTopScorerName').text(response.Name);
                    $('#thirdTopScorerNumber').text(response.Number);
                    $('#thirdTopScorerPosition').text(response.Position);
                    $('#thirdTopScorerGoals').text(response.Goals);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '{{ route("forthTopScorer") }}',
                method: 'GET',
                success: function(response) {
                    $('#forthTopScorerName').text(response.Name);
                    $('#forthTopScorerNumber').text(response.Number);
                    $('#forthTopScorerPosition').text(response.Position);
                    $('#forthTopScorerGoals').text(response.Goals);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                url: '{{ route("fifthTopScorer") }}',
                method: 'GET',
                success: function(response) {
                    $('#fifthTopScorerName').text(response.Name);
                    $('#fifthTopScorerNumber').text(response.Number);
                    $('#fifthTopScorerPosition').text(response.Position);
                    $('#fifthTopScorerGoals').text(response.Goals);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

    </script>

    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>


        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Iniciação", "Petizes", "Traquinas", "Benjamins", "Infantis", "Iniciados", "Juvenis", "Juniores", "Seniores"],

                datasets: [{
                    label: "Jogadores:",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [0,0,0,0,0,0,0,0,2],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

    </script>
@endpush
