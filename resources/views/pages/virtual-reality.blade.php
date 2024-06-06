@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Injury Management</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($injuries->count() > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Denomination</th>
                                    <th>Location</th>
                                    <th>Estimated Time to Recover</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($injuries as $injury)
                                    <tr>
                                        <td>{{ $injury->Denomination }}</td>
                                        <td>{{ $injury->Location }}</td>
                                        <td>{{ $injury->EstimatedTimeToRecover }}</td>
                                        <td>
                                            <a href="{{ route('injuries.edit', $injury->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('injuries.destroy', $injury->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Ensure that $injuries is an instance of LengthAwarePaginator -->
                            @if ($injuries instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $injuries->links() }}
                            @endif
                        @else
                            <p>No injuries found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
