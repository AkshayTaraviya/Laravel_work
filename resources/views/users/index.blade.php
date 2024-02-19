@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="text-end">
            <a href="{{ url('roles') }}" class="btn btn-dark mt-2">Role</a>
            <a href="{{ url('books') }}" class="btn btn-dark mt-2">Book</a>
            <a href="{{ url('users/create') }}" class="btn btn-dark mt-2">New User</a>
            <a href="{{ url('signout') }}" class="btn btn-dark mt-2">Logout</a>
            <a href="{{ url('importExportView') }}" class="btn btn-dark mt-2">importExportView</a>
        </div>

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Books</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ Str::ucfirst($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>
                            {{ $user->books->implode('book', ',') }}
                        </td>
                        <td>
                            <a href="users/{{ $user->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                            <form method="POST" class="d-inline" action="users/{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
