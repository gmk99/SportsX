
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Game</div>
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
                        <form action="{{ route('games.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="IsAtHome">Is At Home</label>
                                <input type="text" class="form-control" id="IsAtHome" name="IsAtHome" required>
                            </div>
                            <div class="form-group">
                                <label for="OpposingTeam">Opposing Team</label>
                                <input type="text" class="form-control" id="OpposingTeam" name="OpposingTeam" required>
                            </div>
                            <div class="form-group">
                                <label for="Date">Date</label>
                                <input type="date" class="form-control" id="Date" name="Date" required>
                            </div>
                            <div class="form-group">
                                <label for="StartingTime">Starting Time</label>
                                <input type="time" class="form-control" id="StartingTime" name="StartingTime" required>
                            </div>
                            <div class="form-group">
                                <label for="GoalsScored">Goals Scored</label>
                                <input type="number" class="form-control" id="GoalsScored" name="GoalsScored">
                            </div>
                            <div class="form-group">
                                <label for="GoalsConceded">Goals Conceded</label>
                                <input type="number" class="form-control" id="GoalsConceded" name="GoalsConceded">
                            </div>
                            <div class="form-group">
                                <label for="EndingTime">Ending Time</label>
                                <input type="time" class="form-control" id="EndingTime" name="EndingTime">
                            </div>
                            <div class="form-group">
                                <label for="FieldFieldID">Field ID</label>
                                <input type="number" class="form-control" id="FieldFieldID" name="FieldFieldID">
                            </div>
                            <div class="form-group">
                                <label for="TeamID">Team ID</label>
                                <input type="number" class="form-control" id="TeamID" name="TeamID">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Game</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

