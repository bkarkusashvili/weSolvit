@extends('layouts.base')

@php
    $templates = ['home', 'auth'];
    $login = $login ?? false;
    $template = $template ?? 'home';
    $lang = app()->getLocale();
@endphp

@section('layout')
    <header id="front-header">
        <div class="navbar">
            <div class="container">
                <a href="{{ route('front.home', $lang) }}">
                    <img class="logo" src="{{ url('images/wesolvit.png') }}" alt="We Solvit">
                </a>
                <nav class="d-lg-block d-none">
                    @if ($template === 'home')
                    <a class="menu-item" href="#partners">@lang('front.menu.company')</a>
                    <a class="menu-item" href="#faqs">@lang('front.menu.faq')</a>
                    <a class="menu-item" href="{{ route('register', $lang) }}">@lang('front.auth.register')</a>
                    @endif
                    @if (Route::currentRouteName() != 'password.reset')
                        @if ($lang == 'en')
                        <a class="menu-item lang" href="{{route(Route::currentRouteName(), 'ka')}}">GE</a>
                        @endif
                        @if ($lang == 'ka')
                        <a class="menu-item lang" href="{{route(Route::currentRouteName(), 'en')}}">EN</a>
                        @endif
                    @endif
                    @if ($login)
                    <a href="{{ route('register', $lang) }}" class="we-btn we-arr-left">
                        <i class="fas fa-arrow-right"></i>
                        <span>@lang('front.auth.register')</span>
                    </a>                    
                    @else
                    <a href="{{ route('login', $lang) }}" class="we-btn we-arr-left">
                        <i class="fas fa-arrow-right"></i>
                        <span>@lang('front.auth.login')</span>
                    </a>
                    @endif
                </nav>
                <nav class="d-lg-none d-flex mb-nav">
                    @if ($login)
                    <a href="{{ route('register', $lang) }}" class="auth register"></a>                    
                    @else
                    <a href="{{ route('login', $lang) }}" class="auth login"></a>
                    @endif
                    <a class="menu"></a>
                </nav>
            </div>
        </div>
        @if ($template == 'home')
        <div class="stat d-lg-flex d-none">
            <div class="stat-item">
                <span class="text-red">{{$stats['total']}}</span>
                @lang('front.stat.total.short')
            </div>
            <div class="stat-item">
                <span class="text-yellow">{{$stats['progress']}}</span>
                @lang('front.stat.progress.short')
            </div>
            <div class="stat-item">
                <span class="text-green">{{$stats['solved']}}</span>
                @lang('front.stat.solved.short')
            </div>
        </div>
        @endif
    </header>
    <div class="mobile-nav" style="display: none;">
        <nav>
            <button type="button" class="close">
                <img src="{{ url('images/close_black.svg') }}" alt="Close" />
            </button>
            @if ($template === 'home')
            <a class="menu-item" href="#partners">@lang('front.menu.company')</a>
            @endif
            <a class="menu-item" href="{{ route('register', $lang) }}">@lang('front.auth.register')</a>
            <a class="menu-item" href="{{ route('login', $lang) }}">@lang('front.auth.login')</a>
            @if ($template === 'home')
            <a class="menu-item" href="#faqs">@lang('front.menu.faq')</a>
            @endif
        </nav>
        <div class="bottom-part">
            <div class="social">
                <a href="{{ config('settings.linkdin') }}" class="linkdin" target="_blank"></a>
                <a href="{{ config('settings.facebook') }}" class="facebook" target="_blank"></a>
            </div>
            <div class="lang">
                <a href="{{route(Route::currentRouteName(), 'ka')}}" class="lang-ka {{$lang == 'ka' ? 'active' : ''}}">
                    <span>ქართული</span>
                </a>
                <a href="{{route(Route::currentRouteName(), 'en')}}" class="lang-en {{$lang == 'en' ? 'active' : ''}}">
                    <span>English</span>
                </a>
            </div>
            <div class="support">
                <span>Supported by</span>
                <a target="_blank" href="{{ config('settings.solvit') }}">
                    <img src="{{ url('images/foot-solvit.png') }}" alt="SOLVIT">
                </a>
            </div>
            <span class="copyright">@lang('front.copyright.short')</span>
        </div>
    </div>
    <main id="front" class="{{ $template }}">
        @yield('content')
    </main>
    <footer id="front-footer">
        <div class="container">
            <div class="col-12 px-0">
                <div class="row">
                    <div class="col-4 col-lg-3 social">
                        <a href="{{ config('settings.linkdin') }}" class="linkdin" target="_blank"></a>
                        <a href="{{ config('settings.facebook') }}" class="facebook" target="_blank"></a>
                    </div>
                    <div class="col-6 d-none d-lg-flex copyright">
                        @lang('front.copyright.long')
                    </div>
                    <div class="col-8 col-lg-3 support">
                        <span>Supported by</span>
                        <a target="_blank" href="{{ config('settings.solvit') }}">
                            <img src="{{ url('images/foot-solvit.png') }}" alt="SOLVIT">
                        </a>
                    </div>
                    <div class="d-block d-lg-none col-12 copyright-short">
                        @lang('front.copyright.short')
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @yield('modal')
@endsection
