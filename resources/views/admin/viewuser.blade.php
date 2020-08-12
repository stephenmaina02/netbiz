@extends('admin.layouts.user')

@section('title','User Details')
@section('page_title','User Details')

@section('content')
        <nav class="nav nav-pills">
            <a href="#account" data-toggle="pill" class="nav-item nav-link">Account Status</a>
            <a href="#payments" data-toggle="pill" class="nav-item nav-link"><i class="fa fa-money"></i> Payments</a>
            <a href="#earnings" data-toggle="pill" class="nav-item nav-link"><i class="fa fa-dollar-sign"></i>Earnings</a>
            <a href="#bonuses" data-toggle="pill" class="nav-item nav-link"><i class="fa fa-life-ring"></i>Bonuses</a>
            <a href="#edituser" data-toggle="pill" class="nav-item nav-link"><i class="fa fa-user"></i>Edit User</a>
        </nav>
          <div class="tab-content">
            <div id="account" class="tab-pane">
                <div class="card bg-light">
                    <div class="row mt-3">
                    @if($user->active=='y')

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="" class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Account Status</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Active</div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-unlock fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>

                    @else
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="" class="card border-left-danger shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Account Status</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Not Active</div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-lock fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    @endif

                     <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="" class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Earnings</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ mCurrency($user->totalEarnings()) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </a>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="" class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Balance</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ mCurrency($user->accumulatedEarnings()) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </a>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('account.referals',['d']) }}" class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Direct Referals</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->directReferals()->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            </div>

            <!---payments section -->
            <div id="payments" class="tab-pane">

            </div>

             <!---earnings section -->
            <div id="earnings" class="tab-pane">

            </div>
            <!---earnings section -->
            <div id="bonuses" class="tab-pane">

            </div>

            <!---edit user section -->
            <div id="edituser" class="tab-pane">
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
            </div>
          </div>
@endsection
