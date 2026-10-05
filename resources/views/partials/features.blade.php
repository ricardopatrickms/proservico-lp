@php
    $anatomy = [
        ['label' => 'O serviço', 'items' => ['Categoria e subcategoria', 'Título curto', 'Descrição detalhada', 'Fotos do problema']],
        ['label' => 'O local', 'items' => ['CEP', 'Endereço e número', 'Cidade e estado', 'Ponto de referência', 'Coordenadas do mapa']],
        ['label' => 'O momento', 'items' => ['Data preferida', 'Período: manhã, tarde ou noite', 'Nível de urgência']],
        ['label' => 'O acordo', 'items' => ['Valor mínimo e máximo', 'Aceita negociar', 'Quem leva o material', 'Preferências de atendimento']],
    ];

    $features = [
        ['icon' => 'chat', 'title' => 'Propostas comparáveis', 'text' => 'Cada profissional responde com um valor e uma mensagem. Você aceita uma e recusa o resto em um toque.'],
        ['icon' => 'tools', 'title' => 'Material sem surpresa', 'text' => 'Diga se o serviço precisa de material e quem fornece — cliente ou profissional — antes de qualquer proposta chegar.'],
        ['icon' => 'sliders', 'title' => 'Suas preferências valem', 'text' => 'Priorize quem tem boas avaliações, indique preferência de gênero do profissional e marque a urgência do pedido.'],
        ['icon' => 'home', 'title' => 'Endereços salvos', 'text' => 'Casa, trabalho, casa da mãe. Cadastre uma vez e reaproveite em toda solicitação sem redigitar nada.'],
        ['icon' => 'map', 'title' => 'Áreas de atendimento', 'text' => 'O profissional define as regiões onde atende e só recebe pedidos que fazem sentido no deslocamento dele.'],
        ['icon' => 'activity', 'title' => 'Status do início ao fim', 'text' => 'Em aberto, em andamento, concluído ou cancelado — cliente e profissional veem sempre o mesmo estado.'],
    ];
@endphp

<section id="recursos" class="py-24 md:py-32">
    <div class="shell">
        <div class="max-w-2xl">
            <span class="eyebrow" data-reveal>Recursos</span>
            <h2 class="display mt-5 text-4xl text-ink-800 md:text-5xl" data-reveal style="--reveal-delay:60ms">
                O pedido chega
                <span class="serif text-brand-600">completo.</span>
            </h2>
            <p class="lede mt-6" data-reveal style="--reveal-delay:120ms">
                Nada de “me manda um orçamento”. O formulário guiado captura tudo o que um profissional
                precisa saber para dar um preço justo já na primeira resposta.
            </p>
        </div>

        {{-- Anatomia de uma solicitação --}}
        <div class="card mt-14 overflow-hidden p-0" data-reveal>
            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-line bg-mist px-7 py-5">
                <p class="text-sm font-bold tracking-tight text-ink-800">Anatomia de uma solicitação</p>
                <p class="text-xs font-medium text-muted">Campos preenchidos em 4 etapas no app</p>
            </div>
            <div class="grid divide-y divide-line md:grid-cols-2 md:divide-y-0 lg:grid-cols-4 lg:divide-x">
                @foreach ($anatomy as $block)
                    <div class="p-7 {{ $loop->index === 1 ? 'md:border-l md:border-line' : '' }} {{ $loop->index === 3 ? 'md:border-l md:border-line' : '' }} {{ $loop->index >= 2 ? 'md:border-t md:border-line lg:border-t-0' : '' }}">
                        <p class="text-[0.6875rem] font-bold tracking-[0.14em] text-brand-600 uppercase">{{ $block['label'] }}</p>
                        <ul class="mt-4 space-y-2.5">
                            @foreach ($block['items'] as $item)
                                <li class="flex gap-2.5 text-[0.9375rem] leading-snug text-body">
                                    <x-icon name="check" class="mt-0.5 size-4 flex-none text-brand-500" :stroke="2.2" />
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Grade de recursos --}}
        <div class="mt-6 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($features as $feature)
                <article class="card card-hover p-7" data-reveal style="--reveal-delay:{{ ($loop->index % 3) * 80 }}ms">
                    <span class="icon-tile">
                        <x-icon :name="$feature['icon']" />
                    </span>
                    <h3 class="mt-6 text-lg font-bold tracking-tight text-ink-800">{{ $feature['title'] }}</h3>
                    <p class="mt-2.5 text-[0.9375rem] leading-relaxed text-muted">{{ $feature['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
