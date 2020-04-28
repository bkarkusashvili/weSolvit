@extends('layouts.app')

@php
    $isEdit = (bool) $item->id;
    $page = 'solved';
    $title = 'გადაჭრილი';

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
        <div class="form-group col-12">
            <label>პრობლემის აღწერა (GEO)</label>
            <textarea name="text_ka" class="form-control @error('text_ka') invalid @enderror">{{ old('text_ka') ?? $item->text_ka }}</textarea>
            @error('text_ka')
            <span class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-12">
            <label>პრობლემის აღწერა (ENG)</label>
            <textarea name="text_en" class="form-control @error('text_en') invalid @enderror">{{ old('text_en') ?? $item->text_en }}</textarea>
            @error('text_en')
            <span class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-12">
            <label>კომენტარი (GEO)</label>
            <textarea name="comment_ka" class="form-control @error('comment_ka') invalid @enderror">{{ old('comment_ka') ?? $item->comment_ka }}</textarea>
            @error('comment_ka')
            <span class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-12">
            <label>კომენტარი (ENG)</label>
            <textarea name="comment_en" class="form-control @error('comment_en') invalid @enderror">{{ old('comment_en') ?? $item->comment_en }}</textarea>
            @error('comment_en')
            <span class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-aside">
        <button type="submit" class="btn w-100 mb-3">{{ $button }}</button>
        <div class="form-block">
            <div class="form-group">
                <label>მოაგვარა</label>
                <select class="partner-select" name="user_id">
                    <option value="0">ცარიელი</option>
                    <optgroup label="კომპანიები">
                        @foreach ($companies as $partner)
                            <option value="{{$partner->id}}" {{(old('user_id') ?? $item->user_id) == $partner->id ? 'selected':''}}>{{ $partner->displayName }}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Freelancers">
                        @foreach ($freelances as $partner)
                            <option value="{{$partner->id}}" {{(old('user_id') ?? $item->user_id) == $partner->id ? 'selected':''}}>{{ $partner->displayName }}</option>
                        @endforeach
                    </optgroup>
                </select>
                @error('user_id')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
</form>
@endsection