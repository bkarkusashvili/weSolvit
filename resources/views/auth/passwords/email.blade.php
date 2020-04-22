@extends('layouts.front', ['template' => 'auth'])

@section('content')
<div class="we-block">
    <h1>პაროლის აღდგენა</h1>
    <form method="POST" action="{{ route('password.email') }}">
    @csrf
        @include('components.input', [
            'name' => 'email',
            'type' => 'email',
            'label' => 'ელ.ფოსტა',
        ])
        <div class="auth-footer end">
            <button type="submit" class="we-btn we-arr-right">
                <span>გაგზავნა</span>
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