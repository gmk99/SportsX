@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Management</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Roles</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        @if ($user->roles->isNotEmpty())
                                            @foreach ($user->roles as $role)
                                                {{ $role->name }}<br>
                                            @endforeach
                                        @else
                                            No Role
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->created_at)
                                            {{ $user->created_at->format('d/m/Y') }}
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Botões de ação -->
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
