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
                            <img src="images/foot-solvit.png" alt="SOLVIT">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection