@extends('admin.layouts.main')

@section('title','Admin Profile')
@section('page_title','Profile')
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.updateprofile', ['id'=>Auth::user()->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="Name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" value={{ Auth::user()->username }} placeholder="Username" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value={{ Auth::user()->email }} placeholder="Email" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" value={{ Auth::user()->phone }} readonly placeholder="Phone" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"  placeholder="New Password">
                  </div>
              </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </form>
    </div>
</div>
@endsection
