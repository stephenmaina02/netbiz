@extends('admin.layouts.main')

@section('title','Income')
@section('page_title','Income Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="text-success text-uppercase float-right">Total Income: 120</h4>
    </div>
    <div class="card-body">
        @if(count($incomes)>0)
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
                      <select name="referral_type" id="" class="form-control form-control-sm">
                        <option value="">Please Select</option>
                        <option value="r">Registration</option>
                        <option value="w">Withdrawal</option>
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
                    <th>Source</th>
                    <th>Amount</th>
                    <th>Date Received</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                    <tr>
                        <td>
                            @if($income->source_type=='r')
                                Registration
                            @elseif($income->source_type=='w')
                                Withdrawal
                            @else
                                Unknown
                            @endif
                        </td>
                        <td>{{ $income->amount }}</td>
                        <td>{{ $income->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$incomes->links()}}
        @else
        <p>No income received at the moment</p>
        @endif
    </div>
</div>
@endsection
