@php
    $columns = [
        'Plataforma' => [
            ['label' => 'Como funciona', 'href' => '#como-funciona'],
            ['label' => 'Categorias', 'href' => '#categorias'],
            ['label' => 'Recursos', 'href' => '#recursos'],
            ['label' => 'Dúvidas', 'href' => '#duvidas'],
        ],
        'Profissionais' => [
            ['label' => 'Por que se cadastrar', 'href' => '#profissionais'],
            ['label' => 'Documentos exigidos', 'href' => '#seguranca'],
            ['label' => 'Áreas de atendimento', 'href' => '#recursos'],
        ],
        'Institucional' => [
            ['label' => 'Segurança', 'href' => '#seguranca'],
            ['label' => 'Contato', 'href' => 'mailto:contato@proservico.com.br'],
        ],
    ];
@endphp

<footer class="bg-ink-950 text-white/60">
    <div class="shell py-16 md:py-20">
        <div class="grid gap-12 lg:grid-cols-12">
            <div class="lg:col-span-5">
                <div class="flex items-center gap-2.5">
                    <span class="grid size-9 place-items-center rounded-xl bg-brand-500 text-white">
                        <x-icon name="bolt" class="size-4.5" :stroke="2" />
                    </span>
                    <span class="text-lg font-bold tracking-tight text-white">
                        Pro<span class="text-accent-500">Serviço</span>
                    </span>
                </div>
                <p class="mt-5 max-w-sm text-sm leading-relaxed">
                    A plataforma que conecta quem precisa de um serviço a profissionais verificados da sua região —
                    com proposta, preço e prazo antes de qualquer visita.
                </p>
            </div>

            @foreach ($columns as $title => $links)
                <nav class="lg:col-span-2 {{ $loop->first ? 'lg:col-start-7' : '' }}" aria-label="{{ $title }}">
                    <p class="text-[0.6875rem] font-bold tracking-[0.14em] text-white/35 uppercase">{{ $title }}</p>
                    <ul class="mt-5 space-y-3">
                        @foreach ($links as $link)
                            <li>
                                <a href="{{ $link['href'] }}" class="text-sm transition-colors hover:text-white">{{ $link['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            @endforeach
        </div>

        <div class="mt-14 flex flex-col gap-4 border-t border-white/10 pt-8 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs">&copy; <span data-year>2026</span> ProServiço. Todos os direitos reservados.</p>
            <p class="text-xs text-white/35">Feito no Brasil.</p>
        </div>
    </div>
</footer>
