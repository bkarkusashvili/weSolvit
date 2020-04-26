@php
    $name = $name ?? '';
    $type = $type ?? 'text';
    $label = $label ?? '';

    $value = $value ?? '';
    $value = $type !== 'password' ? (old($name) ?? $value) : '';

    $class = $value ? 'active working' : 'working';
@endphp

<label class="we-input" data-input="{{ $name }}" data-toggle="modal" data-target="#working">
    <input readonly class="{{ $class }} @error($name) invalid @enderror" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" autocomplete="off">
    <span class="hint" data-toggle="modal" data-target="#working">{{ $label }}</span>
    <a class="work-icon">
        <i class="far fa-clock time active" data-toggle="modal" data-target="#working"></i>
        <i class="fas fa-times-circle delete"></i>
    </a>
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</label>