@extends('layouts.base')

@section('layout')
    <div id="app">
        <aside>
            <div class="fixed">
                <h3 class="title"><strong>Good</strong> Trips</h3>
                <ul class="side-menu">
                    <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>სტატისტიკა</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('user*') ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}">
                            <i class="fas fa-users"></i>
                            <span>მომხმარებლები</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('application*') ? 'active' : '' }}">
                        <a href="{{ route('application.index') }}">
                            <i class="fas fa-tasks"></i>
                            <span>განცხადებები</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('category*') ? 'active' : '' }}">
                        <a href="{{ route('category.index') }}">
                            <i class="fas fa-dice-d6"></i>
                            <span>კატეგორიები</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="content">
            <header></header>
            <main>
                @yield('content')
            </main>
        </div>
    </div>
@endsection