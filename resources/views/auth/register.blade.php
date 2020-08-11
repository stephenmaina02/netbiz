@extends('layouts.app')

@section('title','Register')
@section('page_title','Register')

@section('content')

<div class="row">

  <div class="col-lg-12">

    <div class="blog-comment" style="margin-top: 0 !important">
        <h4>Create A New Account</h4>

      <form id="comment-form" method="post" action="{{ url('/register') }}">

        @csrf
        
        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              <label for="">Name</label>

              <input type="text" autocomplete="off" value="{{ old('name') }}" class="form-control" id="name" name="name" placeholder="Name">

              @error('name')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>                                 
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" autocomplete="off" value="{{ old('username') }}" class="form-control" id="Username" name="username" placeholder="Username">

              @error('username')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>                                 
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" autocomplete="off" value="{{ old('email') }}" class="form-control" id="Email" name="email" placeholder="Email">

              @error('email')
                <small class="text-danger">{{$message}}</small>
              @enderror

            </div>                                 
          </div>

        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Phone</label>
              <input type="text" autocomplete="off" value="{{ old('phone') }}" class="form-control" id="name" name="phone" placeholder="Phone">

              @error('phone')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>                                 
          </div>

          <div class="col-md-8">
            <div class="form-group">
              <label for="">Refered By</label>
              <input type="text" autocomplete="off" value="{{ old('refered_by') }}" class="form-control" id="Username" name="refered_by" placeholder="Refered By">

              @error('refered_by')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>                                 
          </div>

        </div>

        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" autocomplete="off" class="form-control" id="Username" name="password" placeholder="Password">

              @error('password')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>                                 
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="">Confirm Password</label>
              <input type="password" autocomplete="off" class="form-control" id="Email" name="password_confirmation" placeholder="Confirm Password">

            </div>                                 
          </div>

        </div>

        <div class="row">

          <div class="col-md-12">
            <div class="submit-button">
              <button class="btn btn-common" type="submit">Register</button>
            </div>
          </div>

        </div>
      
      </form>

    </div>
  </div>
  

</div>

@endsection
