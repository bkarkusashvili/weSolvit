@php
    $name = $name ?? '';
    $label = $label ?? '';

    $value = $value ?? '';

    $class = $value ? 'active' : '';
@endphp

<label class="we-file" data-input="{{ $name }}">
    <div class="we-file-wrap">
        <input class="{{ $class }} @error($name) invalid @enderror" type="file" name="{{ $name }}" value="{{ $value }}" autocomplete="off">
        <span class="hint">{{ $label }}</span>
    </div>
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</label>