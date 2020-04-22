@extends('layouts.front', ['template' => 'auth', 'login' => true])

@section('content')
<div class="we-block">
    <h1>ავტორიზაცია</h1>
    <form method="POST" action="{{ route('login') }}">
    @csrf
        @include('components.input', [
            'name' => 'email',
            'type' => 'email',
            'label' => 'ელ.ფოსტა',
        ])
        @include('components.input', [
            'name' => 'password',
            'type' => 'password',
            'label' => 'პაროლი',
        ])
        <div>
            <a class="reset" href="{{ route('password.request') }}">დაგავიწყდათ პაროლი?</a>
        </div>
        <div class="auth-footer">
            <a href="{{ route('register') }}">რეგისტრაცია</a>
            <button type="submit" class="we-btn we-arr-right">
                <span>შესვლა</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </form>
</div>
@endsection
