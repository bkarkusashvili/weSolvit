@php
    $name = $name ?? '';
    $type = $type ?? 'text';
    $label = $label ?? '';

    $value = $value ?? '';
    $value = $type !== 'password' ? (old($name) ?? $value) : '';

    $class = $value ? 'active' : '';
@endphp

<label class="we-input" data-input="{{ $name }}">
    <input class="{{ $class }} @error($name) invalid @enderror" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" autocomplete="off">
    <span class="hint">{{ $label }}</span>
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</label>