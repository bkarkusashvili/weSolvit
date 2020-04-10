@extends('layouts.app')

@php
    $isEdit = (bool) $item->id;
    $page = 'category';
    $title = 'კატეგორია';

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
        <div class="form-group">
            <label>სახელი</label>
            <input type="text" name="name" class="form-control @error('name') invalid @enderror" value="{{ old('name') ?? $item->name }}">
            @error('name')
            <span class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-aside">
        <button type="submit" class="btn w-100">{{ $button }}</button>
    </div>
</form>
@endsection