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
<!--Payment Modal-->
<div class="row">
    <button type="button" class="btn btn-primary ml-3 mt-3" data-toggle="modal" data-target="#exampleModal">
        Make Payment
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter Payment Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('account.payments') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" readonly placeholder="Enter Phone" value={{ Auth::user()->phone }}>
                      </div>
                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount"  placeholder="Enter Amount" required="true">
                      </div>
                      <div class="form-group">
                        <label for="trans_no">Transaction Code</label>
                        <input type="text" class="form-control" id="trans_no" name="trans_no"  placeholder="Transaction code" required>
                      </div>
                      <div class="form-group">
                        <label for="sender_name">Sender Name</label>
                        <input type="text" class="form-control" id="sender_name" name="sender_name"  placeholder="Sender Name" required>
                      </div>
                      <div class="form-group">
                        <label for="trans_date">Transaction Date</label>
                        <input type="text" class="form-control" id="trans_date" name="trans_date"  placeholder="Transaction Date" required>
                      </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

          </div>
        </div>
      </div>
</div>

@endsection
