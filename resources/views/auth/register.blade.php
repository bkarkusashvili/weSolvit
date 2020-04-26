@extends('layouts.front', ['template' => 'auth'])

@php
    $role = request()->get('role', 'company');
    $lang = app()->getLocale();
@endphp

@section('content')
<div class="we-block register">
    <div class="col-12"></div>
    <h1>@lang('front.auth.register')</h1>
    <div class="head-nav">
        <a href="{{ route('register', [$lang, 'role' => 'company']) }}" class="{{ $role == 'company' ? 'active' : '' }}">
            <span class="d-inline d-lg-none">@lang('front.auth.com.short')</span>
            <span class="d-none d-lg-inline">@lang('front.auth.com.long')</span>
        </a>
        <a href="{{ route('register', [$lang, 'role' => 'freelance']) }}" class="{{ $role == 'freelance' ? 'active' : '' }}">
            <span class="d-inline d-lg-none">@lang('front.auth.phy.short')</span>
            <span class="d-none d-lg-inline">@lang('front.auth.phy.long')</span>
        </a>
    </div>
    <form method="POST" action="{{ route('register', $lang) }}" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="role" value="{{ $role }}">

        @if ($role == 'company')
            @include('components.input', [
                'name' => 'company_name',
                'type' => 'text',
                'label' => __('front.label.company_name'),
            ])
            @include('components.input', [
                'name' => 'identity',
                'type' => 'number',
                'label' => __('front.label.identity'),
            ])
            @include('components.input', [
                'name' => 'employes',
                'type' => 'number',
                'label' => __('front.label.employes'),
            ])
        @endif
        @if ($role == 'freelance')
            @include('components.input', [
                'name' => 'firstname',
                'type' => 'text',
                'label' => __('front.label.fisrtname'),
            ])
            @include('components.input', [
                'name' => 'lastname',
                'type' => 'text',
                'label' => __('front.label.lastname'),
            ])
        @endif
        @include('components.input', [
            'name' => 'email',
            'type' => 'email',
            'label' => __('front.label.email'),
        ])
        @include('components.input', [
            'name' => 'phone',
            'type' => 'number',
            'label' => __('front.label.contanct_number'),
        ])
        @if ($role == 'company')
            @include('components.working', [
                'name' => 'working_hours',
                'type' => 'text',
                'label' => __('front.label.hours'),
            ])
        @endif
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
        @if ($role == 'freelance')
            @include('components.working', [
                'name' => 'working_hours',
                'type' => 'text',
                'label' => __('front.label.hours'),
            ])
        @endif
        @include('components.input', [
            'name' => 'message',
            'type' => 'text',
            'label' => __('front.label.problem'),
        ])
        @include('components.file', [
            'name' => $role == 'freelance' ? 'cv' : 'image',
            'label' => $role == 'freelance' ? __('front.label.cv') : __('front.label.logo'),
        ])
        <div class="terms">
            <label>
                <input type="checkbox" name="terms">
                <span class="checkbox"></span>
                <span>
                    @lang('front.label.accempt') <a target="_blank" href="{{ route('terms', $lang) }}">@lang('front.label.terms')</a>
                </span>
            </label>
            @error('terms')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="auth-footer">
            <a href="{{ route('login', $lang) }}">@lang('front.auth.login')</a>
            <button type="submit" class="we-btn we-arr-right">
                <span>@lang('front.auth.register')</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </form>
</div>
@endsection

@section('modal')
    @include('modals.working')
@endsection