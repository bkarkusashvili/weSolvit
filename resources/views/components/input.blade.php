@php
    $name = $name ?? '';
    $type = $type ?? 'text';
    $label = $label ?? '';
    $required = $required ?? false;

    $value = $value ?? '';
    $value = $type !== 'password' ? (old($name) ?? $value) : '';

    $class = $value ? 'active' : '';
@endphp

<label class="we-input {{$type == 'password' ? 'we-icon' : ''}}" data-input="{{ $name }}">
    <input class="{{ $class }} @error($name) invalid @enderror" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" autocomplete="off">
    <span class="hint">
        {{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </span>
    @if ($type == 'password')
        <a class="icon">
            <i class="fas fa-eye show"></i>
            <i class="fas fa-eye-slash"></i>
        </a>
    @endif
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</label>