@extends('layouts.front', ['template' => 'auth'])

@php
    $role = request()->get('role', 'company');
@endphp

@section('content')
<div class="we-block register">
    <div class="col-12"></div>
    <h1>რეგისტრაცია</h1>
    <div class="head-nav">
        <a href="{{ route('register', ['role' => 'company']) }}" class="{{ $role == 'company' ? 'active' : '' }}">იურიდიული პირებისთვის</a>
        <a href="{{ route('register', ['role' => 'freelance']) }}" class="{{ $role == 'freelance' ? 'active' : '' }}">ფიზიკური პირებისთვის</a>
    </div>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="role" value="{{ $role }}">

        @if ($role == 'company')
            @include('components.input', [
                'name' => 'company_name',
                'type' => 'text',
                'label' => 'კომპანიის დასხელება',
            ])
            @include('components.input', [
                'name' => 'identity',
                'type' => 'number',
                'label' => 'საიდენტიფიკაციო კოდი',
            ])
            @include('components.input', [
                'name' => 'employes',
                'type' => 'number',
                'label' => 'თანამშრომლების რაოდენობა',
            ])
        @endif
        @if ($role == 'freelance')
            @include('components.input', [
                'name' => 'firstname',
                'type' => 'text',
                'label' => 'სახელი',
            ])
            @include('components.input', [
                'name' => 'lastname',
                'type' => 'text',
                'label' => 'გვარი',
            ])
        @endif
        @include('components.input', [
            'name' => 'email',
            'type' => 'email',
            'label' => 'ელ.ფოსტა',
        ])
        @include('components.input', [
            'name' => 'phone',
            'type' => 'number',
            'label' => 'საკონტაქტო ნომერი',
        ])
        @if ($role == 'company')
            @include('components.working', [
                'name' => 'working_hours',
                'type' => 'text',
                'label' => 'მისაღები სამუშაო საათები',
            ])
        @endif
        @include('components.input', [
            'name' => 'password',
            'type' => 'password',
            'label' => 'პაროლი',
        ])
        @include('components.input', [
            'name' => 'password_confirmation',
            'type' => 'password',
            'label' => 'გაიმეორე პაროლი',
        ])
        @if ($role == 'freelance')
            @include('components.working', [
                'name' => 'working_hours',
                'type' => 'text',
                'label' => 'მისაღები სამუშაო საათები',
            ])
        @endif
        @include('components.input', [
            'name' => 'message',
            'type' => 'text',
            'label' => 'აღწერე როგორ დაგვეხმარები...',
        ])
        @include('components.file', [
            'name' => $role == 'freelance' ? 'cv' : 'image',
            'label' => $role == 'freelance' ? 'ატვირთე შენი CV' : 'ატვირთე კომპანიის ლოგო',
        ])
        <div class="terms">
            <label>
                <input type="checkbox" name="terms">
                <span class="checkbox"></span>
                <span>
                    ვეთანხმები რეგისტრაციის <a target="_blank" href="{{ route('terms') }}">პირობებს</a>
                </span>
            </label>
            @error('terms')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="auth-footer">
            <a href="{{ route('login') }}">ავტორიზაცია</a>
            <button type="submit" class="we-btn we-arr-right">
                <span>რეგისტრაცია</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </form>
</div>
@endsection

@section('modal')
    @include('modals.working')
@endsection