@extends('layouts.base')

@php
    $isAdmin = Auth::user()->isAdmin();
@endphp

@section('layout')
    <div id="app">
        <aside>
            <div class="fixed">
                <div class="logo">
                    <img src="{{ url('images/wesolvit.png') }}" alt="WESOLVIT">
                </div>
                <ul class="side-menu">
                    <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>სტატისტიკა</span>
                        </a>
                    </li>
                    @if ($isAdmin)
                    <li class="{{ request()->is('user*') ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}">
                            <i class="fas fa-users"></i>
                            <span>პარტნიორები</span>
                        </a>
                    </li>
                    @endif
                    <li class="{{ request()->is('application*') ? 'active' : '' }}">
                        <a href="{{ route('application.index') }}">
                            <i class="fas fa-tasks"></i>
                            <span>განცხადებები</span>
                        </a>
                    </li>
                    @if ($isAdmin)
                    <li class="{{ request()->is('category*') ? 'active' : '' }}">
                        <a href="{{ route('category.index') }}">
                            <i class="fas fa-dice-d6"></i>
                            <span>კატეგორიები</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('solved*') ? 'active' : '' }}">
                        <a href="{{ route('solved.index') }}">
                            <i class="fas fa-passport"></i>
                            <span>გადაჭრილი</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </aside>
        <div class="content">
            <header>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="we-btn" value="გასვლა">
                </form>
            </header>
            <main>
                @yield('content')
            </main>
        </div>
    </div>
@endsection