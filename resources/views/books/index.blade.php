@extends('layouts.book')

@section('main')
    <div class="container">

        <form action="" method="GET">
            <div class="col-md-3 mt-3">
                <label><b>Filter by Name</b></label>
                <select name="role_id" class="form-select mt-2">
                    <option value="">Select</option>
                    <option value="1" {{ Request::get('role_id') == '1' }}>admin</option>
                    <option value="2" {{ Request::get('role_id') == '2' }}>User</option>
                </select>
            </div>
            <div class="col-md-3 mt-3">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>

        <div class="text-end">
            <a href="{{ url('books/create') }}" class="btn btn-dark mt-2">New Book</a>
            <a href="{{ url('users') }}" class="btn btn-dark mt-2">Back</a>
        </div>

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Book</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $book->book }}</td>
                        <td>{{ $book->user?->name }}</td>
                        <td>
                            <a href="books/{{ $book->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                            <form method="POST" class="d-inline" action="books/{{ $book->id }}">
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
