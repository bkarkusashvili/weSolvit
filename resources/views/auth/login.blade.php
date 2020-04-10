@extends('layouts.auth')

@section('content')
    <h1>ადმინში შესვლა</h1>
    <h6 class="caps">შეიყვანეთ მეილი და პაროლი</h6>
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-group">
            <label for="email">მეილი:</label>
            <input id="email" type="email" class="form-control @error('email') invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            @error('email')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">პაროლი:</label>
            {{-- <div class="split">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">აღდგენა</a>
                @endif
            </div> --}}
            <input id="password" type="password" class="form-control @error('password') invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="off" autofocus>
            @error('password')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        {{-- <div class="form-group">
            <input id="remember" type="checkbox" class="form-control @error('password') invalid @enderror" name="remember" value="{{ old('remember') }}">
            <label for="remember">დამახსოვრება</label>
        </div> --}}
        <button type="submit" class="btn">შესვლა</button>
    </form>
@endsection
