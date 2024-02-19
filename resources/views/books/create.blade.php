@extends('layouts.book')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card border border-secondary mt-3 p-3">
                    <form method="POST" action="/books" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <label>Book</label>
                            <input type="text" name="book" class="form-control border border-secondary" id="book">
                            <span class="text-danger">
                                @error('book')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mt-3">
                            <label>Author</label>
                            <select name="author" class="form-control border border-secondary">
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
