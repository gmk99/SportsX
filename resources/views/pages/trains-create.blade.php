@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create New Train'])

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Train</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('trains.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Date">Date</label>
                                <input type="date" class="form-control" id="Date" name="Date" required>
                            </div>
                            <div class="form-group">
                                <label for="StartingTime">Starting Time</label>
                                <input type="time" class="form-control" id="StartingTime" name="StartingTime" required>
                            </div>
                            <div class="form-group">
                                <label for="EndingTime">Ending Time</label>
                                <input type="time" class="form-control" id="EndingTime" name="EndingTime" required>
                            </div>
                            <div class="form-group">
                                <label for="TeamID">Team ID</label>
                                <input type="number" class="form-control" id="TeamID" name="TeamID" required>
                            </div>
                            <div class="form-group">
                                <label for="FieldFieldID">Field ID</label>
                                <input type="number" class="form-control" id="FieldFieldID" name="FieldFieldID" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Train</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth.footer')
@endsection
