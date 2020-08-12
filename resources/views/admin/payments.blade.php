@extends('admin.layouts.main')

@section('title','Payments')
@section('page_title','Payment Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="text-primary text-uppercase float-right">Total Paid In: 250</h4>
    </div>
    <div class="card-body">
        @if(count($payments)>0)
        <form class="card-header bg-white" method="get">

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
                      <input type="text" name="date_from" value="{{ request()->input('date_from') }}" placeholder="Date From" id="" class="form-control form-control-sm">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-calendar"></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group ml-3">
                    <div class="input-group">
                      <input type="text" name="date_to" value="{{ request()->input('date_to') }}" placeholder="Date To" id="" class="form-control form-control-sm">
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
                <button class="btn btn-sm btn-primary">
                  <span class="fa fa-search"></span>
                </button>
              </div>
            </div>

          </form>
        <table class="table table-stripped">
            <thead>
                <tr class="text-info">
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Amount</th>
                    <th>Transaction Code</th>
                    <th>Transaction Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->sender_name }}</td>
                        <td>{{ $payment->phone }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->trans_no }}</td>
                        <td>{{ $payment->trans_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$payments->links()}}
        @else
        <p>No income received at the moment</p>
        @endif
    </div>
</div>
@endsection
