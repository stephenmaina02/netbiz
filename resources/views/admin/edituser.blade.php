@extends('admin.layouts.main')

@section('title','Edit User')
@section('page_title','Edit User')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.updateuser', ['id'=> $user->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" id="username" name="username" readonly placeholder="Username" value="{{ $user->name }}">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" id="phone" name="phone" readonly placeholder="Username" value="{{ $user->phone }}">
              </div>
              <div class="form-group">
                <label for="banned">Ban/ Unban</label>
                <select name="banned" id="banned" class="form-control">
                    <option value="n">Unban</option>
                    <option value="y">Ban</option>
                </select>
              </div>
              @if(Auth::user()->super_admin=='y')
              <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="u">User</option>
                    <option value="a">Admin</option>
                </select>
              </div>
              @endif
              <button type="submit" class="btn btn-primary">Update User Details</button>
              <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
