@extends('layouts.front', ['template' => 'auth'])

@section('content')
<div class="we-block">
    <h1>ახალი პაროლი</h1>
    <form method="POST" action="{{ route('password.update') }}">
    @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        @include('components.input', [
            'name' => 'email',
            'type' => 'email',
            'value' => $email,
            'label' => 'ელ.ფოსტა',
        ])
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
        <div class="auth-footer end">
            <button type="submit" class="we-btn we-arr-right">
                <span>აღდგენა</span>
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