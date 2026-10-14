@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$modalSize = match ($maxWidth) {
    'sm' => 'modal-sm',
    'md' => '',
    'lg' => 'modal-lg',
    'xl', '2xl' => 'modal-xl',
    default => '',
};
@endphp

<div
    x-data="{
        show: @js($show),
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('modal-open');
        } else {
            document.body.classList.remove('modal-open');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="modal fade show"
    tabindex="-1"
    style="display: none;"
    :style="show ? 'display: block; background: rgba(0,0,0,0.5);' : 'display: none;'"
>
    <div class="modal-dialog modal-dialog-centered {{ $modalSize }}">
        <div class="modal-content shadow border-0 rounded-3">
            {{ $slot }}
        </div>
    </div>
</div>
