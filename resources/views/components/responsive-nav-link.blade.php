@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-mobile-link w-full'
            : 'nav-mobile-link disabled w-full';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
