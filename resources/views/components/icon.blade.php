@props(['name', 'stroke' => 1.5])

@php
    $paths = [
        'search' => '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>',
        'camera' => '<path d="M3 9a2 2 0 0 1 2-2h1.6a2 2 0 0 0 1.7-.9l.7-1.1a2 2 0 0 1 1.7-.9h2.6a2 2 0 0 1 1.7.9l.7 1.1a2 2 0 0 0 1.7.9H19a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/><circle cx="12" cy="13" r="3.2"/>',
        'pin' => '<path d="M12 21s7-5.6 7-11a7 7 0 1 0-14 0c0 5.4 7 11 7 11Z"/><circle cx="12" cy="10" r="2.6"/>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2.5"/><path d="M3 10h18M8 3v4M16 3v4"/>',
        'wallet' => '<path d="M3 8.5A2.5 2.5 0 0 1 5.5 6H18a3 3 0 0 1 3 3v7a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3Z"/><path d="M3 9h13"/><circle cx="17" cy="13" r="1.2"/>',
        'tools' => '<path d="M14.5 5.5a3.5 3.5 0 0 0 4.6 4.6L21 12l-8.4 8.4a2 2 0 0 1-2.8 0l-.2-.2a2 2 0 0 1 0-2.8L18 9"/><path d="m6.5 3 3 3-2 2-3-3z"/><path d="m4.5 5 3 3-3.5 3.5a2 2 0 0 1-2.8-2.8Z"/>',
        'sliders' => '<path d="M5 21V14M5 10V3M12 21v-9M12 8V3M19 21v-5M19 12V3"/><path d="M2.5 14h5M9.5 8h5M16.5 16h5"/>',
        'home' => '<path d="M4 10.5 12 4l8 6.5V19a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2Z"/><path d="M9.5 21v-6h5v6"/>',
        'activity' => '<path d="M3 12h4l2.5-7 5 14L17 12h4"/>',
        'shield' => '<path d="M12 3 5 6v6c0 4.4 3 7.9 7 9 4-1.1 7-4.6 7-9V6Z"/><path d="m9 12 2 2 4-4"/>',
        'file' => '<path d="M14 3v4a2 2 0 0 0 2 2h4"/><path d="M19 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l6 6v10a2 2 0 0 1-2 2Z"/><path d="m9.5 15 1.8 1.8 3.5-3.6"/>',
        'user-check' => '<path d="M15 20v-1.5a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4V20"/><circle cx="9" cy="7.5" r="3.5"/><path d="m16 11 2 2 4-4"/>',
        'badge' => '<path d="M12 3.5 14 6l3.3-.3.4 3.3 2.6 2-2 2.7 1 3.2-3.2 1-1.3 3-3-1.4-3 1.4-1.3-3-3.2-1 1-3.2-2-2.7 2.6-2 .4-3.3L10 6Z"/><path d="m9.5 12.2 1.8 1.8 3.4-3.6"/>',
        'phone' => '<rect x="6" y="2.5" width="12" height="19" rx="3"/><path d="M10.5 5.5h3"/>',
        'dashboard' => '<rect x="3" y="3" width="7.5" height="8.5" rx="2"/><rect x="13.5" y="3" width="7.5" height="5.5" rx="2"/><rect x="3" y="14.5" width="7.5" height="6.5" rx="2"/><rect x="13.5" y="11.5" width="7.5" height="9.5" rx="2"/>',
        'plug' => '<path d="M9 3v5M15 3v5"/><path d="M6 8h12v3a6 6 0 0 1-6 6 6 6 0 0 1-6-6Z"/><path d="M12 17v4"/>',
        'chat' => '<path d="M21 12a8 8 0 0 1-8 8H8l-4 2 1-4.2A8 8 0 1 1 21 12Z"/><path d="M9 11h6M9 14.5h3.5"/>',
        'bolt' => '<path d="M13 2 4.5 13.5H11l-1 8.5 8.5-11.5H12Z"/>',
        'map' => '<path d="m3 6.5 6-2.5 6 2.5 6-2.5v13l-6 2.5-6-2.5-6 2.5Z"/><path d="M9 4v13M15 6.5v13"/>',
        'star' => '<path d="m12 3.5 2.7 5.5 6 .9-4.35 4.25L17.4 20 12 17.15 6.6 20l1.05-5.85L3.3 9.9l6-.9Z"/>',
        'arrow-right' => '<path d="M4 12h15"/><path d="m13 6 6 6-6 6"/>',
        'check' => '<path d="m4.5 12.5 5 5 10-11"/>',
        'plus' => '<path d="M12 5v14M5 12h14"/>',
        'users' => '<path d="M16 20v-1.5a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4V20"/><circle cx="9" cy="7.5" r="3.5"/><path d="M22 20v-1.5a4 4 0 0 0-3-3.85"/><path d="M16.5 4.15a4 4 0 0 1 0 6.7"/>',
        'briefcase' => '<rect x="2.5" y="7" width="19" height="13" rx="2.5"/><path d="M8.5 7V5.5a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2V7"/><path d="M2.5 12.5h19"/>',
        'lock' => '<rect x="4" y="10" width="16" height="11" rx="2.5"/><path d="M8 10V7.5a4 4 0 0 1 8 0V10"/>',
    ];
@endphp

<svg {{ $attributes->merge(['class' => 'size-5', 'aria-hidden' => 'true']) }}
     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ $stroke }}"
     stroke-linecap="round" stroke-linejoin="round">
    {!! $paths[$name] ?? '' !!}
</svg>
