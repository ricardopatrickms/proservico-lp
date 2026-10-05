@php
    $tracks = [
        'cliente' => [
            'label' => 'Para quem contrata',
            'icon' => 'search',
            'steps' => [
                ['title' => 'Descreva o serviço', 'text' => 'Escolha a categoria, dê um título, explique o problema e anexe fotos direto da câmera ou da galeria.'],
                ['title' => 'Diga onde e quando', 'text' => 'O CEP preenche o endereço, você confirma número e ponto de referência e marca a data e o período preferido.'],
                ['title' => 'Receba propostas', 'text' => 'Profissionais verificados da sua região respondem com valor e mensagem. Você compara lado a lado.'],
                ['title' => 'Aceite e acompanhe', 'text' => 'Ao aceitar, a solicitação vira “em andamento” e segue com você até a conclusão.'],
            ],
        ],
        'profissional' => [
            'label' => 'Para quem executa',
            'icon' => 'briefcase',
            'steps' => [
                ['title' => 'Crie seu cadastro', 'text' => 'Profissão, experiência, região e as áreas onde você atende — em três etapas guiadas.'],
                ['title' => 'Envie seus documentos', 'text' => 'RG ou CNH, certificado profissional, certidão de antecedentes criminais e foto de perfil.'],
                ['title' => 'Passe pela aprovação', 'text' => 'Nossa equipe analisa cada cadastro. Aprovado, seu perfil fica ativo e visível na plataforma.'],
                ['title' => 'Monte o catálogo e proponha', 'text' => 'Cadastre seus serviços com preço e envie propostas aos pedidos que chegam da sua região.'],
            ],
        ],
    ];
@endphp

<section id="como-funciona" class="bg-mist py-24 md:py-32">
    <div class="shell">
        <div class="mx-auto max-w-2xl text-center">
            <span class="eyebrow" data-reveal>Como funciona</span>
            <h2 class="display mt-5 text-4xl text-ink-800 md:text-5xl" data-reveal style="--reveal-delay:60ms">
                Quatro passos.
                <span class="serif text-brand-600">Nenhuma enrolação.</span>
            </h2>
        </div>

        <div data-tabs class="mt-12">
            <div role="tablist" aria-label="Público" class="mx-auto flex w-full max-w-sm flex-col gap-1 rounded-3xl bg-white/70 p-1.5 ring-1 ring-line sm:w-fit sm:max-w-none sm:flex-row sm:rounded-full"
                 data-reveal style="--reveal-delay:120ms">
                @foreach ($tracks as $key => $track)
                    <button type="button" role="tab" data-tab="{{ $key }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                            tabindex="{{ $loop->first ? '0' : '-1' }}"
                            class="tab w-full justify-center sm:w-auto">
                        <x-icon :name="$track['icon']" class="size-4" />
                        {{ $track['label'] }}
                    </button>
                @endforeach
            </div>

            @foreach ($tracks as $key => $track)
                <div data-panel="{{ $key }}" role="tabpanel" class="mt-14 {{ $loop->first ? '' : 'hidden' }}">
                    <ol class="relative grid gap-10 md:grid-cols-2 lg:grid-cols-4 lg:gap-6">
                        <span class="absolute top-6 right-6 left-6 hidden h-px bg-gradient-to-r from-brand-200 via-brand-300 to-transparent lg:block" aria-hidden="true"></span>

                        @foreach ($track['steps'] as $i => $step)
                            <li class="relative" data-reveal style="--reveal-delay:{{ $i * 80 }}ms">
                                <span class="relative z-10 grid size-12 place-items-center rounded-2xl bg-white text-base font-bold text-brand-600 ring-1 ring-line">
                                    {{ $i + 1 }}
                                </span>
                                <h3 class="mt-6 text-lg font-bold tracking-tight text-ink-800">{{ $step['title'] }}</h3>
                                <p class="mt-2.5 text-[0.9375rem] leading-relaxed text-muted">{{ $step['text'] }}</p>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endforeach
        </div>
    </div>
</section>
