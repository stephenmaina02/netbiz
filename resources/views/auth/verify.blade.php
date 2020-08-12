@extends('layouts.app')

@section('title','Verify Your Email Address')
@section('page_title','Verify Your Email Address')

@section('content')

<div class="blog-comment" style="margin-top: 0 !important">

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-info p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
    </form>
    
</div>

@endsection
