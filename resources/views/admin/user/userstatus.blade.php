@extends('admin.layouts.user')

@section('title','User Status')
@section('page_title','User Status')
@section('content')
                <div class="row">
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
@endsection
