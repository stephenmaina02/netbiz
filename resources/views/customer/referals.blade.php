@extends('customer.layouts.main')

@section('title',$title)
@section('page_title',$page_title)

@section('content')


<!-- Content Row -->
  <div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">All Referals</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $referalsCounter }}</div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Direct Referals</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $directReferalsCount }}</div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">First Indirect Referals</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $firstIndirectReferalsCount }}</div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Second Indirect Referal</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $secondIndirectReferalsCount }}</div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Third Indirect Referals</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $thirdIndirectReferalsCount }}</div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

<div class="card mb-4 shadow">

  <form class="card-body bg-white form-search" method="get">
    <div class="row">
      <div class="col-md">
        <div class="form-inline">

          <div class="form-group">
            <div class="input-group">
              <input type="text" name="query" value="{{ request()->input('query') }}" placeholder="Search" id="" class="form-control form-control-sm">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-search"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group ml-3">
            <div class="input-group">
              <select name="referral_type" id="" class="form-control form-control-sm">
                <option value="">Please Select</option>
                @foreach(referalTypes() as $key => $value)

                  @if($key === request('referral_type'))
                    <option selected value="{{ $key }}">{{ $value }}</option>
                  @else
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endif

                @endforeach
              </select>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-list"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group ml-3">
            <div class="input-group">
              <input type="text" name="date_from" value="{{ request()->input('date_from') }}" placeholder="Date From" id="" class="form-control form-control-sm date_from">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-calendar"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group ml-3">
            <div class="input-group">
              <input type="text" name="date_to" value="{{ request()->input('date_to') }}" placeholder="Date To" id="" class="form-control form-control-sm date_to">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-calendar"></span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-1">
        <button class="btn btn-sm btn-primary btn-search" type="button">
          <span class="fa fa-search"></span>
        </button>
      </div>
    </div>
    
  </form>
  
</div>


@if($referals->count())

<div class="card shadow">
  
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr class="bg-info">
          <td class="text-white">Date</td>
          <td class="text-white">Name</td>
          <td class="text-white">Refferal Type</td>
          <td class="text-white">Amount Earned</td>
        </tr>
      </thead>
      <tbody>
        @foreach($referals as $referal)
          <tr>
            <td>{{ formatedDate($referal->created_at) }}</td>
            <td>{{ $referal->userRefered->name }}</td>
            <td>{{ $referal->referalType() }}</td>
            <td>
              <span class="text-success">+{{ money($referal->amount) }}</span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="card-footer bg-white">
      {{ $referals->links() }}
    </div>
  </div>
</div>

@else

<div class="alert alert-danger">No Referals</div>

@endif


@endsection
