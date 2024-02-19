@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="text-end">
            <a href="juniors/create" class="btn btn-dark mt-2">New User</a>
        </div>

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($juniors as $junior)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $junior->user }}</td>
                        <td>{{ $junior->email }}</td>
                        <td>{{ $junior->role }}</td>
                        <td>
                            <a href="juniors/{{ $junior->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                            <form method="POST" class="d-inline" action="juniors/{{ $junior->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
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
