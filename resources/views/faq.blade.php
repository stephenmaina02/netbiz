@extends('layouts.app')

@section('title','FAQ')
@section('page_title','Frequently Asked Questions')

@section('content')
@if (count($faqs)>0)
<div class="card" style="background-color: #f7fcf8">
    <div class="card-body text-center">
        @foreach ($faqs as $faq)
            <h5><b><u>{{ $faq->question }}</u></b></h5>
            <p>{{ $faq->answer }}</p>
        @endforeach
    </div>
</div>
@else
<p>No Questions asked at the moment</p>
@endif
@endsection
