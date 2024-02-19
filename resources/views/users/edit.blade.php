@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card border border-secondary mt-3 p-3">
                    <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-3">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control border border-secondary" value="{{ old('name',$user->name) }}">
                        </div>
                        <div class="form-group mt-3">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control border border-secondary" value="{{ old('email',$user->email) }}">
                        </div>
                        <div class="form-group mt-3">
                        <label>Role</label>
                        <select class="form-select border border-secondary" name="role">
                            @foreach($roles as $item)
                             <option value="{{ $item->id }}" {{ $user->role_id == $item->id ? 'selected' : '' }}>
                                {{ $item->role }}
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
