@extends('admin.layouts.main')

@section('title','Charges')
@section('page_title','Transaction Charges')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" required>
                </div>
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <div class="form-group">
                    <label for="code">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
        @if(count($charges)>0)
        <table class="table table-stripped">
            <thead>
                <th>Type</th>
                <th>Code</th>
                <th>Amount</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($charges as $charge)
                    <tr>
                        <td>{{ $charge->type }}</td>
                        <td>{{ $charge->code }}</td>
                        <td>{{ $charge->amount }}</td>
                        <td><a href="#" class="text-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No charges added!!!</p>
        @endif
    </div>
    </div>
    </div>
</div>
@endsection
