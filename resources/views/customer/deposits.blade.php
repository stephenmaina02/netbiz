@extends('customer.layouts.main')

@section('title','Deposits')
@section('page_title','Deposits')

@section('content')


<div class="row">

  <div class="col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Deposits</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ mCurrency($totalAmount) }}</div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Balance</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ mCurrency($totalBalance) }}</div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>

</div>

@if($deposits->count())

<div class="card shadow">
  
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr class="bg-primary">
          <td class="text-white">Date</td>
          <td class="text-white">Transaction No.</td>
          <td class="text-white">Amount</td>
        </tr>
      </thead>
      <tbody>
        @foreach($deposits as $deposit)
          <tr>
            <td>{{ formatedDate($deposit->trans_date) }}</td>
            <td>{{ $deposit->trans_no }}</td>
            <td>
              <span class="text-success">{{ money($deposit->amount) }}</span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="card-footer bg-white">
      {{ $deposits->links() }}
    </div>
  </div>
</div>

@else

<div class="alert alert-danger">No Deposits</div>

@endif

@endsection
