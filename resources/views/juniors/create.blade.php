@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card border border-secondary mt-3 p-3">
                    <form method="POST" action="/juniors" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" name="user" class="form-control border border-secondary" id="user">
                            <span class="text-danger">
                                @error('user')
                                    {{ $message }}
                                @enderror
                            <span>
                        </div><br>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control border border-secondary" id="email"
                                placeholder="Enter email">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div><br>
                        <label>Role</label>
                        <select class="form-select border border-secondary" name="role">
                            <option selected>Select role</option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select><br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control border border-secondary"
                                id="password" placeholder="Password">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}    
                                @enderror
                            </span>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
