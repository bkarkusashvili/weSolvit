@extends('layouts.front', ['template' => 'auth'])

@php
    $lang = app()->getLocale();
@endphp

@section('content')
<div class="we-block">
    <h1>@lang('front.auth.new_password')</h1>
    <form method="POST" action="{{ route('password.update', $lang) }}">
    @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        @include('components.input', [
            'name' => 'email',
            'type' => 'email',
            'value' => $email,
            'label' => __('front.label.email'),
        ])
        @include('components.input', [
            'name' => 'password',
            'type' => 'password',
            'label' => __('front.label.password'),
        ])
        @include('components.input', [
            'name' => 'password_confirmation',
            'type' => 'password',
            'label' => __('front.label.password_confirm'),
        ])
        <div class="auth-footer end">
            <button type="submit" class="we-btn we-arr-right">
                <span>@lang('front.reset')</span>
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
            'hint' => __('passwords.sent'),
        ])
    @endif
@endsection