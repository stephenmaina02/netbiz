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

@if($referals->count())

<div class="card">
  <div class="card-header bg-white">
    <span class="card-title text-info ">{{ $page_title }}</span>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Name</th>
          <th>Refferal Type</th>
          <th>Amount Earned</th>
        </tr>
      </thead>
      <tbody>
        @foreach($referals as $referal)
          <tr>
            <td>{{ formatedDate($referal->created_at) }}</td>
            <td>{{ $referal->user->name }}</td>
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
