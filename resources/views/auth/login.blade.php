@extends('layouts.front', ['template' => 'auth', 'login' => true])

@php
    $lang = app()->getLocale();
@endphp

@section('content')
<div class="we-block">
    <h1>@lang('front.auth.login')</h1>
    <form method="POST" action="{{ route('login', $lang) }}">
    @csrf
        @include('components.input', [
            'name' => 'email',
            'type' => 'email',
            'label' => __('front.label.email'),
        ])
        @include('components.input', [
            'name' => 'password',
            'type' => 'password',
            'label' => __('front.label.password'),
        ])
        <div>
            <a class="reset" href="{{ route('password.request', $lang) }}">@lang('front.auth.forget')</a>
        </div>
        <div class="auth-footer">
            <a href="{{ route('register', $lang) }}">@lang('front.auth.register')</a>
            <button type="submit" class="we-btn we-arr-right">
                <span>@lang('front.login')</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </form>
</div>
@endsection
