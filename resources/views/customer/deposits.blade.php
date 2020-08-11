@extends('customer.layouts.main')

@section('title','Deposits')
@section('page_title','Deposits')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <h4 class="text-center">Automatic Mpesa Deposit</h4>
                <hr>
                <form action="#" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" readonly placeholder="Enter Phone" value={{ Auth::user()->phone }}>
                      </div>
                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                      </div>
                      <button type="submit" class="btn btn-primary">Pay Now</button>
                </form>
            </div>
            <div class="col-md-8">
                <h4 class="text-center">Manual Mpesa Payment</h4>
                <hr>
                <h6>Steps</h6>
                <div class="row">
                    <div class="col-md-6">
                        <ol>
                            <li>Go to M-PESA</li>
                            <li>Select Lipa na M-PESA</li>
                            <li>Buy Goods & Services</li>
                            <li>Enter 5271869 as Till Number</li>
                            <li>Enter Amount and Ok</li>
                            <li>Paste the Transaction code and click Pay</li>
                        </ol>
                        <label class="badge badge-danger">NB:</label><span class="text-info">Use the number registered in your account</span>
                    </div>
                    <div class="col-md-6">
                        <form action="#" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="transaction_code">Enter Transaction Code:</label>
                                <input type="text" class="form-control" id="transaction_code" name="transaction_code"  placeholder="Enter Transaction Code" >
                            </div>
                            <button type="submit" class="btn btn-primary">Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
