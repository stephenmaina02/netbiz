@extends('admin.layouts.main')

@section('title','FAQ')
@section('page_title','Frequently Asked Questions')

@section('content')
<div class="card">
    <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" id="question" name="question"  placeholder="Type a question here" required>
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <input type="text" class="form-control" id="answer" name="answer"  placeholder="Answer here" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        <hr>
        @if(count($faqs)>0)
        <table class="table table-stripped">
            <thead>
                <th>Question</th>
                <th>Answer</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td><a href="#" class="text-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No Frequently Asked Questions yet!!!</p>
        @endif
    </div>
</div>
@endsection
