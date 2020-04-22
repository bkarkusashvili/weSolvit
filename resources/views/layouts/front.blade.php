@extends('layouts.base')

@php
    $templates = ['home', 'auth'];
    $login = $login ?? false;
    $template = $template ?? 'home';
@endphp

@section('layout')
    <header id="front-header">
        <div class="navbar">
            <div class="container">
                <a href="{{ route('front.home') }}">
                    <img class="logo" src="{{ url('images/wesolvit.png') }}" alt="We Solvit">
                </a>
                <nav class="d-md-block d-none">
                    @if ($template === 'home')
                    <a class="menu-item" href="#partners">ჩართული კომპანიები</a>
                    <a class="menu-item" href="#faqs">FAQ</a>
                    <a class="menu-item" href="{{ route('register') }}">რეგისტრაცია</a>
                    @endif
                    @if ($login)
                    <a href="{{ route('register') }}" class="we-btn we-arr-left">
                        <i class="fas fa-arrow-right"></i>
                        <span>რეგისტრაცია</span>
                    </a>                    
                    @else
                    <a href="{{ route('login') }}" class="we-btn we-arr-left">
                        <i class="fas fa-arrow-right"></i>
                        <span>ავტორიზაცია</span>
                    </a>
                    @endif
                </nav>
            </div>
        </div>
        @if ($template == 'home')
        <div class="stat d-md-flex d-none">
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
        @endif
    </header>
    <main id="front" class="{{ $template }}">
        @yield('content')
    </main>
    <footer id="front-footer">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-3 social">
                        <a href="" class="linkdin"></a>
                        <a href="" class="facebook"></a>
                    </div>
                    <div class="col-6 copyright">
                        WESOLVIT ოფიციალური ვებგვერდი © 2020 ყველა უფლება დაცულია
                    </div>
                    <div class="col-3 support">
                        <span>Supported by</span>
                        <a href="">
                            <img src="{{ url('images/foot-solvit.png') }}" alt="SOLVIT">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @yield('modal')
@endsection
