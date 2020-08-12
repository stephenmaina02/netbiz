@extends('admin.layouts.main')

@section('title','Users')
@section('page_title','Registered Users')

@section('content')
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Users</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">250</div>
                  </div>
                  <div class="col-auto">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Inactive Users</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">250</div>
                  </div>
                  <div class="col-auto">
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

        <form class="card-header bg-white" method="get">
            <div class="row">
              <div class="col-md">
                <div class="form-inline">

                  <div class="form-group">
                    <div class="input-group float-right">
                      <input type="text" name="query" value="{{ request()->input('query') }}" placeholder="Search" id="" class="form-control form-control-sm">
                      <div class="input-group-append">
                      </div>
                      <div class="col-md-1">
                        <button class="btn btn-sm btn-primary">
                          <span class="fa fa-search"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </form>

        @if(count($users)>0)
            <table class="table table-bordered ">
                <thead>
                    <tr class="bg-success">
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Banned</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                @if($user->active=='n')
                                <label class="text-secondary">Inactive</label>
                                @elseif($user->active=='y')
                                <label class="text-success">Active</label>
                                @else
                                <label class="text-danger">Unknown</label>
                                @endif
                            </td>
                            <td>
                                @if($user->banned=='n')
                                <label class="text-secondary">Not Banned</label>
                                @elseif($user->banned=='y')
                                <label class="text-danger">Banned</label>
                                @else
                                <label class="text-info">Unknown</label>
                                @endif
                            </td>
                            <td>
                                @if($user->role=='u')
                                <label class="text-secondary">User</label>
                                @elseif($user->role=='a')
                                <label class="text-secondary">Admin</label>
                                @else
                                <label class="text-info">Unknown</label>
                                @endif
                            </td>
                            <td><a href="{{route('admin.get-user',['id'=>$user->id]) }}" class="text-primary">Edit</a></td>
                        </tr>
                    </tbody>
                    @endforeach
            </table>
            {{$users->links()}}
        @else
            <p>No users have registered at the moment</p>
        @endif
    </div>
</div>

@endsection
