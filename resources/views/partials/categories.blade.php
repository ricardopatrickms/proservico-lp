@php
    $groups = $categoryGroups ?? [];
@endphp

<section id="categorias" class="py-24 md:py-32">
    <div class="shell">
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div class="max-w-2xl">
                <span class="eyebrow" data-reveal>Catálogo</span>
                <h2 class="display mt-5 text-4xl text-ink-800 md:text-5xl" data-reveal style="--reveal-delay:60ms">
                    Do reparo de hoje
                    <span class="serif text-brand-600">à reforma do mês.</span>
                </h2>
            </div>
            <p class="lede max-w-sm md:text-base" data-reveal style="--reveal-delay:120ms">
                O catálogo é organizado em grupos e subcategorias e vive no painel administrativo —
                novas profissões entram na hora, sem atualizar o app.
            </p>
        </div>

        <div class="mt-14 grid gap-5 lg:grid-cols-3">
            @forelse ($groups as $index => $group)
                <article class="card card-hover flex flex-col p-7" data-reveal style="--reveal-delay:{{ $index * 90 }}ms">
                    <div class="flex items-center justify-between">
                        <span class="icon-tile">
                            <x-icon :name="$group['icon']" />
                        </span>
                        <span class="font-mono text-xs font-medium tracking-widest text-muted">
                            {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>

                    <h3 class="mt-6 text-xl font-bold tracking-tight text-ink-800">{{ $group['name'] }}</h3>
                    <p class="mt-1.5 text-sm text-muted">{{ count($group['items']) }} especialidades</p>

                    <div class="mt-6 flex flex-wrap gap-2">
                        @foreach ($group['items'] as $item)
                            <span class="chip">
                                <span class="chip-dot"></span>
                                {{ $item }}
                            </span>
                        @endforeach
                    </div>
                </article>
            @empty
                <p class="text-muted lg:col-span-3" data-reveal>
                    Catálogo temporariamente indisponível.
                </p>
            @endforelse
        </div>
    </div>
</section>
