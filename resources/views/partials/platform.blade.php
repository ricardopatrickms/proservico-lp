@php
    $surfaces = [
        [
            'icon' => 'phone',
            'name' => 'App mobile',
            'text' => 'Uma experiência para cliente e outra para profissional, com fluxos, cores e telas próprias.',
            'tags' => ['Solicitar serviço', 'Propostas', 'Meus serviços', 'Perfil e endereços'],
        ],
        [
            'icon' => 'dashboard',
            'name' => 'Painel administrativo',
            'text' => 'Onde a operação acontece: aprovar cadastros, acompanhar solicitações e manter o catálogo.',
            'tags' => ['Clientes', 'Profissionais', 'Aprovações', 'Categorias'],
        ],
        [
            'icon' => 'plug',
            'name' => 'API',
            'text' => 'Autenticação JWT, sessões com refresh e contas suspensas bloqueadas em toda requisição.',
            'tags' => ['JWT', 'Upload de documentos', 'Endereços', 'Propostas'],
        ],
    ];

    $metrics = [
        ['label' => 'Clientes', 'value' => '1.284'],
        ['label' => 'Profissionais ativos', 'value' => '317'],
        ['label' => 'Aprovações pendentes', 'value' => '12'],
        ['label' => 'Solicitações', 'value' => '2.940'],
    ];

    $byStatus = [
        ['label' => 'Em aberto', 'value' => 38, 'class' => 'bg-brand-500'],
        ['label' => 'Em andamento', 'value' => 27, 'class' => 'bg-ink-800'],
        ['label' => 'Concluídos', 'value' => 30, 'class' => 'bg-emerald-500'],
        ['label' => 'Cancelados', 'value' => 5, 'class' => 'bg-line'],
    ];
@endphp

<section id="plataforma" class="bg-mist py-24 md:py-32">
    <div class="shell">
        <div class="max-w-2xl">
            <span class="eyebrow" data-reveal>Plataforma</span>
            <h2 class="display mt-5 text-4xl text-ink-800 md:text-5xl" data-reveal style="--reveal-delay:60ms">
                Uma operação,
                <span class="serif text-brand-600">três frentes.</span>
            </h2>
        </div>

        <div class="mt-14 grid gap-5 lg:grid-cols-3">
            @foreach ($surfaces as $surface)
                <article class="card card-hover flex flex-col p-7" data-reveal style="--reveal-delay:{{ $loop->index * 90 }}ms">
                    <span class="icon-tile">
                        <x-icon :name="$surface['icon']" />
                    </span>
                    <h3 class="mt-6 text-lg font-bold tracking-tight text-ink-800">{{ $surface['name'] }}</h3>
                    <p class="mt-2.5 text-[0.9375rem] leading-relaxed text-muted">{{ $surface['text'] }}</p>
                    <div class="mt-6 flex flex-1 flex-wrap content-end gap-1.5 border-t border-line pt-5">
                        @foreach ($surface['tags'] as $tag)
                            <span class="rounded-md bg-mist px-2.5 py-1 text-xs font-medium text-body">{{ $tag }}</span>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Recorte do dashboard administrativo --}}
        <div class="card mt-6 overflow-hidden p-0" data-reveal>
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-line px-7 py-5">
                <p class="text-sm font-bold tracking-tight text-ink-800">Visão geral da operação</p>
                <span class="flex items-center gap-1.5 text-xs font-medium text-muted">
                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                    Recorte do painel · dados ilustrativos
                </span>
            </div>

            <div class="grid divide-y divide-line sm:grid-cols-2 sm:divide-y-0 lg:grid-cols-4 lg:divide-x">
                @foreach ($metrics as $metric)
                    <div class="px-7 py-6 {{ $loop->index === 1 || $loop->index === 3 ? 'sm:border-l sm:border-line' : '' }} {{ $loop->index >= 2 ? 'sm:border-t sm:border-line lg:border-t-0' : '' }}">
                        <p class="text-[0.6875rem] font-semibold tracking-[0.12em] text-muted uppercase">{{ $metric['label'] }}</p>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-ink-800">{{ $metric['value'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="border-t border-line px-7 py-6">
                <p class="text-[0.6875rem] font-semibold tracking-[0.12em] text-muted uppercase">Solicitações por status</p>
                <div class="mt-4 flex h-2.5 overflow-hidden rounded-full">
                    @foreach ($byStatus as $status)
                        <span class="{{ $status['class'] }}" style="width: {{ $status['value'] }}%"></span>
                    @endforeach
                </div>
                <div class="mt-4 flex flex-wrap gap-x-6 gap-y-2">
                    @foreach ($byStatus as $status)
                        <span class="flex items-center gap-2 text-xs font-medium text-muted">
                            <span class="size-2 rounded-full {{ $status['class'] }}"></span>
                            {{ $status['label'] }} · {{ $status['value'] }}%
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
