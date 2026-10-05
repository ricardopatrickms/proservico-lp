@php
    $nav = [
        ['label' => 'Como funciona', 'href' => '#como-funciona'],
        ['label' => 'Categorias', 'href' => '#categorias'],
        ['label' => 'Recursos', 'href' => '#recursos'],
        ['label' => 'Segurança', 'href' => '#seguranca'],
        ['label' => 'Para profissionais', 'href' => '#profissionais'],
    ];
@endphp

<header data-header class="fixed inset-x-0 top-0 z-50">
    <div class="shell flex h-20 items-center justify-between gap-6">
        <a href="#conteudo" class="flex items-center gap-2.5" aria-label="ProServiço — página inicial">
            <span class="grid size-9 place-items-center rounded-xl bg-brand-500 text-white shadow-[0_8px_20px_-8px_rgba(59,158,255,0.9)]">
                <x-icon name="bolt" class="size-4.5" :stroke="2" />
            </span>
            <span class="text-lg font-bold tracking-tight text-white">
                Pro<span class="text-accent-500">Serviço</span>
            </span>
        </a>

        <nav class="hidden items-center gap-8 lg:flex" aria-label="Navegação principal">
            @foreach ($nav as $item)
                <a href="{{ $item['href'] }}" class="nav-link">{{ $item['label'] }}</a>
            @endforeach
        </nav>

        <div class="hidden items-center gap-3 md:flex">
            <a href="#comecar" class="btn btn-sm btn-outline-invert">Entrar</a>
            <a href="#comecar" class="btn btn-sm btn-primary">
                Criar conta
                <x-icon name="arrow-right" class="size-4" />
            </a>
        </div>

        <button type="button" data-nav-toggle aria-expanded="false" aria-controls="nav-mobile"
                class="grid size-10 place-items-center rounded-xl border border-white/15 text-white md:hidden">
            <span class="sr-only">Abrir menu</span>
            <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round">
                <path d="M4 7h16M4 12h16M4 17h16" />
            </svg>
        </button>
    </div>

    <div id="nav-mobile" data-nav-panel class="hidden md:hidden">
        <div class="mx-6 mb-4 rounded-3xl border border-white/10 bg-ink-950/95 p-6 backdrop-blur-xl">
            <nav class="flex flex-col divide-y divide-white/8" aria-label="Navegação mobile">
                @foreach ($nav as $item)
                    <a href="{{ $item['href'] }}" class="py-3.5 text-base font-medium text-white/80">{{ $item['label'] }}</a>
                @endforeach
            </nav>
            <div class="mt-5 grid gap-2.5">
                <a href="#comecar" class="btn btn-primary w-full">Criar conta</a>
                <a href="#comecar" class="btn btn-outline-invert w-full">Entrar</a>
            </div>
        </div>
    </div>
</header>
