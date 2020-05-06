@extends('layouts.app')

@php
    $page = 'user';
    $title = 'პაროლის შეცვლა';

    $action = route('password.change');
    $button = 'განახლება';
    $method = 'POST';
@endphp

@section('content')
<div class="head">
    <h1>{{ $title }}</h1>
</div>
<form class="form-content" action="{{ $action }}" method="POST">
    @method($method)
    @csrf
    <div class="form-body form-block">
        <div class="row w-100">
            <div class="form-group col-8 offset-2">
                <label>ახალი პაროლი</label>
                <input type="password" name="password" class="form-control @error('password') invalid @enderror">
                @error('password')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-8 offset-2">
                <label>დადასტურება</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') invalid @enderror">
                @error('password_confirmation')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-aside">
        <button type="submit" class="btn w-100 mb-3">{{ $button }}</button>
    </div>
</form>
@endsection

@section('modal')
    @if(session()->has('status'))
    @include('modals.info', [
        'open' => true,
        'text' => 'პაროლი შეიცვალა',
    ])
    @endif
@endsection