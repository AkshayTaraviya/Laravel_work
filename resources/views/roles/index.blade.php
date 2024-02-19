@extends('layouts.role')

@section('main')
    <div class="container">
        <div class="text-end">
            <a href="{{ url('roles/create') }}" class="btn btn-dark mt-2">New Role</a>
            <a href="{{ url('users') }}" class="btn btn-dark mt-2">Back</a>
        </div>

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $role->role }}</td>
                        <td>
                            <a href="roles/{{ $role->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                            <form method="POST" class="d-inline" action="books/{{ $role->id }}">
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
