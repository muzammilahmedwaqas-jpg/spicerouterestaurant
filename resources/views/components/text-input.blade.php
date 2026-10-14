@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'form-control' . ($attributes->has('name') && $errors->has($attributes->get('name')) ? ' is-invalid' : '')]) }}>
