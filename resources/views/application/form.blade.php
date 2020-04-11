@extends('layouts.app')

@php
    $isEdit = (bool) $item->id;
    $page = 'application';
    $title = 'განცხადება';

    $action = $isEdit ? route($page.'.update', $item) : route($page.'.store');
    $button = $isEdit ? 'განახლება' : 'დამატება';
    $method = $isEdit ? 'PUT' : 'POST';
@endphp


@section('content')
<div class="head">
    <h1>{{ $title }}</h1>
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>
<form class="form-content" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @method($method)
    @csrf
    <div class="form-body form-block">
        <div class="row">
            <div class="form-group col-6">
                <label>სახელი</label>
                <input type="text" name="firstname" class="form-control @error('firstname') invalid @enderror" value="{{ old('firstname') ?? $item->firstname }}">
                @error('firstname')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label>გვარი</label>
                <input type="text" name="lastname" class="form-control @error('lastname') invalid @enderror" value="{{ old('lastname') ?? $item->lastname }}">
                @error('lastname')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label>კომპანია</label>
                <input type="text" name="company" class="form-control @error('company') invalid @enderror" value="{{ old('company') ?? $item->company }}">
                @error('company')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label>საიდენთიფიკაციო</label>
                <input type="text" name="identity" class="form-control @error('identity') invalid @enderror" value="{{ old('identity') ?? $item->identity }}">
                @error('identity')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label>მეილი</label>
                <input type="email" name="email" class="form-control @error('email') invalid @enderror" value="{{ old('email') ?? $item->email }}">
                @error('email')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label>ტელეფონი</label>
                <input type="text" name="phone" class="form-control @error('phone') invalid @enderror" value="{{ old('phone') ?? $item->phone }}">
                @error('phone')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label>თანამშრომლების რაოდენობა</label>
                <input type="text" name="employes" class="form-control @error('employes') invalid @enderror" value="{{ old('employes') ?? $item->employes }}">
                @error('employes')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label>სფერო</label>
                <input type="text" name="type" class="form-control @error('type') invalid @enderror" value="{{ old('type') ?? $item->type }}">
                @error('type')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-12">
                <label>პრობლემის აღწერა</label>
                <textarea name="message" class="form-control @error('message') invalid @enderror">{{ old('message') ?? $item->message }}</textarea>
                @error('message')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-aside">
        <div class="form-block">
            <div class="form-group d-info">
                <label>სტატუსი</label>
                <div id="status-select"></div>
                {!! $item->statusHtml !!}
            </div>
            <div class="form-group d-info">
                <label>პრიორიტეტი</label>
                {!! $item->priorityHtml !!}
            </div>
            <div class="form-group d-info">
                <label>კომპანია</label>
                {{ $item->user->displayName }}
            </div>
        </div>
    </div>
</form>
@endsection