@php
    $name = $name ?? '';
    $type = $type ?? 'text';
    $label = $label ?? '';

    $value = $value ?? '';
    $value = $type !== 'password' ? (old($name) ?? $value) : '';

    $class = $value ? 'active' : '';
@endphp

<label class="we-input" data-input="{{ $name }}" data-toggle="modal" data-target="#working">
    <input readonly class="{{ $class }} @error($name) invalid @enderror" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" autocomplete="off">
    <span class="hint" data-toggle="modal" data-target="#working">{{ $label }}</span>
    <i class="fas fa-eye show"></i>
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</label>