@extends('admin.layouts.user')

@section('title','User Details')
@section('page_title','User Details')

@section('content')
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
      <button type="submit" class="btn btn-primary">Update User Details</button>
      <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
