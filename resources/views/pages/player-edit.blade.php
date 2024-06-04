@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Player'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $player->FullName }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $player->position->Designation ?? 'Position' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('player.update', $player->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Player</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Player Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fullname" class="form-control-label">Full Name</label>
                                        <input class="form-control" type="text" name="FullName" id="fullname" value="{{ old('FullName', $player->FullName) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birthdate" class="form-control-label">Birthdate</label>
                                        <input class="form-control" type="date" name="Birthdate" id="birthdate" value="{{ old('Birthdate', $player->Birthdate) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="association-number" class="form-control-label">Association Number</label>
                                        <input class="form-control" type="text" name="AssociationNumber" id="association-number" value="{{ old('AssociationNumber', $player->AssociationNumber) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone-number" class="form-control-label">Phone Number</label>
                                        <input class="form-control" type="text" name="PhoneNumber" id="phone-number" value="{{ old('PhoneNumber', $player->PhoneNumber) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position" class="form-control-label">Position</label>
                                        <select class="form-control" name="PositionID" id="position">
                                            @foreach($positions as $position)
                                                <option value="{{ $position->id }}" {{ $player->PositionID == $position->id ? 'selected' : '' }}>
                                                    {{ $position->Designation }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="team" class="form-control-label">Team</label>
                                        <select class="form-control" name="TeamID" id="team">
                                            @foreach($teams as $team)
                                                <option value="{{ $team->id }}" {{ $player->teamPlayer->team_id == $team->id ? 'selected' : '' }}>
                                                    {{ $team->Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Other Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="number" class="form-control-label">Number</label>
                                        <input class="form-control" type="text" name="Number" id="number" value="{{ old('Number', $player->teamPlayer->Number ?? '') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status" class="form-control-label">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Apto" {{ $player->injuryPlayer ? '' : 'selected' }}>Apto</option>
                                            <option value="Lesionado" {{ $player->injuryPlayer ? 'selected' : '' }}>Lesionado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
