@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card border border-secondary mt-3 p-3">
                    <form method="POST" action="/juniors/{{ $junior->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label>User</label>
                          <input type="text" name="user" class="form-control border border-secondary" value="{{ old('user',$junior->user) }}">
                        </div><br>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control border border-secondary" value="{{ old('email',$junior->email) }}">
                        </div><br>
                        <select class="form-select border border-secondary" name="role">
                            <option value="user" {{ $junior->role == 'user' ? 'selected' : '' }}>user</option>
                            <option value="admin" {{ $junior->role == 'admin' ? 'selected' : '' }}>admin</option>
                        </select><br>
                        <button type='submit' class='btn btn-primary'>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
