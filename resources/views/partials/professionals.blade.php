@php
    $benefits = [
        ['icon' => 'pin', 'title' => 'Pedidos da sua região', 'text' => 'Você define as áreas de atendimento e recebe só o que dá para atender.'],
        ['icon' => 'briefcase', 'title' => 'Catálogo com preço', 'text' => 'Cadastre cada serviço que você oferece com descrição e valor de referência.'],
        ['icon' => 'chat', 'title' => 'Proposta do seu jeito', 'text' => 'Responda com o seu valor e uma mensagem que explique o que está incluso.'],
        ['icon' => 'wallet', 'title' => 'Recebimento no seu PIX', 'text' => 'Chave PIX ou conta bancária cadastradas já no seu perfil profissional.'],
    ];
@endphp

<section id="profissionais" class="relative isolate overflow-hidden bg-gradient-to-br from-accent-500 via-accent-600 to-[#94211e] py-24 md:py-32">
    <div class="bg-grid absolute inset-0" aria-hidden="true"></div>

    <div class="shell relative grid items-center gap-16 lg:grid-cols-12 lg:gap-14">
        <div class="lg:col-span-6">
            <span class="eyebrow text-white/70" data-reveal>Para profissionais</span>
            <h2 class="display mt-5 text-4xl text-white md:text-5xl" data-reveal style="--reveal-delay:60ms">
                Seu próximo cliente está
                <span class="serif block">a três quarteirões.</span>
            </h2>
            <p class="lede mt-6 max-w-lg text-white/75" data-reveal style="--reveal-delay:120ms">
                Sem disputa de anúncio, sem pagar para aparecer. Cadastro aprovado, você entra na régua de
                quem recebe os pedidos abertos na sua região e responde com a sua proposta.
            </p>

            <dl class="mt-10 grid gap-x-8 gap-y-7 sm:grid-cols-2">
                @foreach ($benefits as $benefit)
                    <div data-reveal style="--reveal-delay:{{ $loop->index * 70 }}ms">
                        <dt class="flex items-center gap-2.5 text-[0.9375rem] font-bold text-white">
                            <x-icon :name="$benefit['icon']" class="size-4.5" />
                            {{ $benefit['title'] }}
                        </dt>
                        <dd class="mt-2 text-sm leading-relaxed text-white/65">{{ $benefit['text'] }}</dd>
                    </div>
                @endforeach
            </dl>

            <div class="mt-11 flex flex-col gap-3 sm:flex-row" data-reveal>
                <a href="#comecar" class="btn btn-white">
                    Criar conta de profissional
                    <x-icon name="arrow-right" class="size-4" />
                </a>
                <a href="#seguranca" class="btn btn-outline-invert">Ver o que é exigido</a>
            </div>
        </div>

        <div class="lg:col-span-6 lg:pl-6" data-reveal style="--reveal-delay:160ms">
            <div class="relative mx-auto w-full max-w-[22rem] lg:ml-auto">
                <div class="phone bg-white/15">
                    <div class="phone-screen bg-white">
                        <img
                            src="/images/professionals-app.png"
                            alt="Pedidos disponíveis no app ProServiço para profissionais"
                            class="block h-auto w-full"
                            width="389"
                            height="401"
                            loading="eager"
                            decoding="async"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
