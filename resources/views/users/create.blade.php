@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card border border-secondary mt-3 p-3">
                    <form method="POST" action="/users" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control border border-secondary" id="name">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                                <span>
                        </div>
                        <div class="form-group mt-3">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control border border-secondary" id="email"
                                placeholder="Enter email">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mt-3">
                            <label>Role</label>
                            <select name="role" class="form-select border border-secondary">
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control border border-secondary"
                                id="password" placeholder="Password">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
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
