@php
    $name = $name ?? '';
    $type = $type ?? 'text';
    $label = $label ?? '';

    $value = $value ?? '';
    $value = $type !== 'password' ? (old($name) ?? $value) : '';

    $class = $value ? 'active' : '';
@endphp

<div class="we-input" data-select data-input="{{ $name }}">
    <input class="{{ $class }} @error($name) invalid @enderror" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" autocomplete="off">
    <span class="hint">{{ $label }}</span>
    <div class="we-wrap">
        <div class="we-select">
            @foreach ($options as $option)
                <span data-value="{{$option}}">{{ $option }}</span>    
            @endforeach
        </div>
    </div>
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</div>