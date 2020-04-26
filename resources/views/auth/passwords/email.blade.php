@extends('layouts.front', ['template' => 'auth'])

@php
    $lang = app()->getLocale();
@endphp

@section('content')
<div class="we-block">
    <h1>@lang('front.auth.reset')</h1>
    <form method="POST" action="{{ route('password.email', $lang) }}">
    @csrf
        @include('components.input', [
            'name' => 'email',
            'type' => 'email',
            'label' => __('front.label.email'),
        ])
        <div class="auth-footer end">
            <button type="submit" class="we-btn we-arr-right">
                <span>@lang('front.send')</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </form>
</div>
@endsection

@section('modal')
    @if(session()->has('status'))
        @include('modals.info', [
            'open' => true,
            'text' => __('passwords.sent'),
        ])
    @endif
@endsection