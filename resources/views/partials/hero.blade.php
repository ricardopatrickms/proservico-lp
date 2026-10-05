@php
    $trust = [
        ['icon' => 'file', 'label' => 'Documentos conferidos'],
        ['icon' => 'shield', 'label' => 'Antecedentes criminais'],
        ['icon' => 'wallet', 'label' => 'Propostas com valor'],
        ['icon' => 'pin', 'label' => 'Profissionais da sua região'],
    ];
@endphp

<section class="bg-ink bg-grid relative isolate overflow-hidden pt-32 pb-20 md:pt-40 md:pb-28">
    <div class="shell relative grid items-center gap-16 lg:grid-cols-12 lg:gap-10">

        {{-- Coluna de texto --}}
        <div class="lg:col-span-6 xl:col-span-6">
            <span class="eyebrow eyebrow-invert" data-reveal>App + painel web · Brasil</span>

            <h1 class="display mt-6 text-[2.75rem] text-white sm:text-6xl xl:text-[4.25rem]" data-reveal style="--reveal-delay:60ms">
                Conectando quem&nbsp;precisa
                <span class="serif block text-brand-300">a quem faz.</span>
            </h1>

            <p class="lede mt-7 max-w-xl text-white/65" data-reveal style="--reveal-delay:120ms">
                Descreva o serviço com fotos, endereço e a faixa de orçamento que cabe no seu bolso.
                Profissionais verificados da sua região respondem com propostas — você compara e escolhe.
            </p>

            <div class="mt-9 flex flex-col gap-3 sm:flex-row" data-reveal style="--reveal-delay:180ms">
                <a href="#comecar" class="btn btn-primary">
                    Solicitar um serviço
                    <x-icon name="arrow-right" class="size-4" />
                </a>
                <a href="#profissionais" class="btn btn-outline-invert">Quero oferecer meus serviços</a>
            </div>

            <dl class="mt-12 grid max-w-lg grid-cols-2 gap-x-6 gap-y-5 border-t border-white/10 pt-8"
                data-reveal style="--reveal-delay:240ms">
                @foreach ($trust as $item)
                    <div class="flex items-center gap-3">
                        <span class="grid size-8 flex-none place-items-center rounded-lg bg-white/8 text-brand-300">
                            <x-icon :name="$item['icon']" class="size-4" />
                        </span>
                        <dt class="text-sm font-medium text-white/70">{{ $item['label'] }}</dt>
                    </div>
                @endforeach
            </dl>
        </div>

        {{-- Mockup do app --}}
        <div class="relative lg:col-span-6 xl:col-start-8 xl:col-span-5" data-reveal style="--reveal-delay:160ms">
            <div class="relative mx-auto w-full max-w-[20rem] lg:mr-0 lg:ml-auto xl:mr-4">

                {{-- Card flutuante: verificação --}}
                <div class="glass absolute top-12 -left-4 z-20 hidden w-52 p-4 xl:block xl:-left-44">
                    <div class="flex items-center gap-2.5">
                        <span class="grid size-8 place-items-center rounded-lg bg-brand-500/20 text-brand-300">
                            <x-icon name="shield" class="size-4" />
                        </span>
                        <p class="text-sm font-semibold text-white">Perfil verificado</p>
                    </div>
                    <p class="mt-2.5 text-xs leading-relaxed text-white/55">
                        RG/CNH · Certificado profissional · Certidão de antecedentes
                    </p>
                </div>

                {{-- Card flutuante: proposta aceita --}}
                <div class="glass absolute bottom-20 -right-4 z-20 hidden w-48 p-4 xl:block xl:-left-36 xl:right-auto">
                    <p class="text-[0.6875rem] font-semibold tracking-[0.14em] text-brand-300 uppercase">Proposta aceita</p>
                    <p class="mt-1.5 text-xl font-bold text-white">R$ 150,00</p>
                    <p class="mt-1 text-xs text-white/55">Carlos M. · hoje, 14h–18h</p>
                </div>

                {{-- Aparelho --}}
                <div class="phone">
                    <div class="phone-screen">
                        <img
                            src="/images/hero-app.png"
                            alt="Tela Meus Serviços do app ProServiço"
                            class="block h-auto w-full"
                            width="1080"
                            height="2400"
                            loading="eager"
                            decoding="async"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
