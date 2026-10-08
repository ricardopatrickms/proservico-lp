@props([
    'size' => 'md',
    'layout' => 'row',
    'google' => 'outline-invert',
    'apple' => 'primary',
])

@php
    $sizeClass = $size === 'sm' ? 'btn-sm' : '';
    $wrap = $layout === 'stack' ? 'grid gap-2.5' : 'flex flex-wrap items-center gap-3';
    $width = $layout === 'stack' ? 'w-full' : '';
@endphp

<div {{ $attributes->merge(['class' => $wrap]) }}>
    <a href="#" class="btn {{ $sizeClass }} btn-{{ $google }} {{ $width }}" aria-label="Baixar o ProServiço na Google Play">
        <svg viewBox="0 0 24 24" class="size-4" fill="currentColor" aria-hidden="true">
            <path d="M3.6 2.4c-.4.3-.6.8-.6 1.4v16.4c0 .6.2 1.1.6 1.4l.1.1 9.2-9.2v-.2L3.7 2.3l-.1.1Zm10.4 8.7 2.6-2.6-8.7-5c-.5-.3-1-.3-1.4 0l7.5 7.6Zm2.8 1.2 2.9 1.7c.8.5.8 1.2 0 1.7l-2.9 1.6-3.1-3.1 3.1-1.9Zm-11.9 7.2c.4.3.9.3 1.4 0l8.7-5-2.6-2.6-7.5 7.6Z"/>
        </svg>
        Google Play
    </a>
    <a href="#" class="btn {{ $sizeClass }} btn-{{ $apple }} {{ $width }}" aria-label="Baixar o ProServiço na App Store">
        <svg viewBox="0 0 24 24" class="size-4" fill="currentColor" aria-hidden="true">
            <path d="M16.4 12.6c0-2.2 1.8-3.3 1.9-3.3-1-1.5-2.6-1.7-3.2-1.7-1.4-.1-2.7.8-3.4.8-.7 0-1.8-.8-3-.8-1.5 0-2.9.9-3.7 2.2-1.6 2.7-.4 6.8 1.1 9 .8 1.1 1.7 2.3 2.9 2.2 1.1 0 1.6-.7 3-.7s1.8.7 3 .7 2-1.1 2.7-2.2c.9-1.3 1.2-2.5 1.2-2.6-.1 0-2.5-1-2.5-3.6ZM14.5 6.3c.6-.8 1.1-1.8 1-2.8-1 .1-2.1.6-2.8 1.4-.6.7-1.2 1.8-1 2.8 1.1.1 2.1-.5 2.8-1.4Z"/>
        </svg>
        App Store
    </a>
</div>
