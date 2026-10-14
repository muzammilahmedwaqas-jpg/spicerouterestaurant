@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label fw-semibold text-secondary small']) }}>
    {{ $value ?? $slot }}
</label>
