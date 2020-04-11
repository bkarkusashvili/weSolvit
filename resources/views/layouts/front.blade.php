@extends('layouts.base')

@section('layout')
    <header id="front-header">
        <div class="navbar">
            <div class="container">
                <a href="{{ route('front.home') }}">
                    <img class="logo" src="images/wesolvit.png" alt="We Solvit">
                </a>
                <nav>
                    <a class="menu-item" href="#partners">ჩართული კომპანიები</a>
                    <a class="menu-item" href="">FAQ</a>
                    <a class="menu-item" href="">რეგისტრაცია</a>
                    <a href="{{ route('login') }}" class="we-btn we-arr-left">
                        <i class="fas fa-arrow-right"></i>
                        <span>ავტორიზაცია</span>
                    </a>
                </nav>
            </div>
        </div>
        <div class="stat">
            <div class="stat-item">
                <span class="text-red">421</span>
                დაფიქსირებული
            </div>
            <div class="stat-item">
                <span class="text-yellow">63</span>
                დაწყებული
            </div>
            <div class="stat-item">
                <span class="text-green">111</span>
                გადაჭრილი
            </div>
        </div>
    </header>
    <main id="front">
        @yield('content')
    </main>
@endsection