@extends('layouts.book')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card border border-secondary mt-3 p-3">
                    <form method="POST" action="/books/{{ $book->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-3">
                          <label>book</label>
                          <input type="text" name="book" class="form-control border border-secondary" value="{{ old('book',$book->book) }}">
                        </div>
                        <div class="form-group mt-3">
                        <label>Author</label>
                        <select name="author" class="form-select border border-secondary">
                            @foreach($users as $item)
                             <option value="{{ $item->id }}" {{ $book->user_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                             </option>
                            @endforeach
                         </select>
                        </div>
                        <div class="form-group mt-3">
                        <button type='submit' class='btn btn-primary'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
