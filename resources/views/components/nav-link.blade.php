@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link'
            : 'nav-link disabled';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
