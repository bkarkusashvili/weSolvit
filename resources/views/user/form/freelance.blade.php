@extends('layouts.app')

@php
    $isEdit = (bool) $item->id;
    $page = 'user';
    $title = 'პარტნიორები';

    $action = $isEdit ? route($page.'.update', $item) : route($page.'.store');
    $button = $isEdit ? 'განახლება' : 'დამატება';
    $method = $isEdit ? 'PUT' : 'POST';
@endphp

@section('content')
<div class="head">
    <h1>{{ $title }}</h1>
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
                <label>სამუშაო საათები</label>
                <input type="text" name="working_hours" class="form-control @error('working_hours') invalid @enderror" value="{{ old('working_hours') ?? $item->working_hours }}">
                @error('working_hours')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-12">
                <label>ტექსტი</label>
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
        <button type="submit" class="btn w-100 mb-3">{{ $button }}</button>
        <div class="form-body form-block">
            <div class="form-group d-info">
                <label>როლი</label>
                <span class="status info">{{ucfirst($item->role)}}</span>
            </div>
            <div class="form-group d-info">
                <label>სტატუსი</label>
                {!! $item->status_html !!}
            </div>
            <div class="form-group d-info">
                <label>CV</label>
                <a href="{{$item->cv}}" target="_blank">ნახვა</a>
            </div>
        </div>
    </div>
</form>
@endsection