@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Injury</div>

                    <div class="card-body">
                        <form action="{{ route('injuries.update', $injury->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="Denomination">Denomination</label>
                                <input type="text" name="Denomination" id="Denomination" class="form-control" value="{{ $injury->Denomination }}" required>
                            </div>

                            <div class="form-group">
                                <label for="Location">Location</label>
                                <input type="text" name="Location" id="Location" class="form-control" value="{{ $injury->Location }}" required>
                            </div>

                            <div class="form-group">
                                <label for="EstimatedTimeToRecover">Estimated Time to Recover</label>
                                <input type="text" name="EstimatedTimeToRecover" id="EstimatedTimeToRecover" class="form-control" value="{{ $injury->EstimatedTimeToRecover }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
