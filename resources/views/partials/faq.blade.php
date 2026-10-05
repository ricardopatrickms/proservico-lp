@php
    $faq = [
        [
            'q' => 'Como eu escolho entre as propostas que recebo?',
            'a' => 'Cada proposta traz o valor, uma mensagem do profissional e o perfil dele — avaliação, serviços concluídos e documentos verificados. Ao aceitar uma, as demais são recusadas automaticamente e a solicitação passa para “em andamento”.',
        ],
        [
            'q' => 'Dá para editar a solicitação depois de publicada?',
            'a' => 'Dá. Enquanto ela estiver em aberto você pode ajustar descrição, fotos, endereço, data, período e faixa de orçamento. Também pode cancelar a qualquer momento.',
        ],
        [
            'q' => 'Quanto tempo leva para meu cadastro de profissional ser aprovado?',
            'a' => 'O tempo depende da conferência dos quatro documentos obrigatórios pela equipe. Enquanto o cadastro está pendente, você acessa o app mas não recebe pedidos nem consegue enviar propostas.',
        ],
        [
            'q' => 'Quem compra o material do serviço?',
            'a' => 'Isso é decidido na própria solicitação. Você marca se o serviço precisa de material, quem fica responsável por ele — cliente ou profissional — e pode detalhar o que é necessário. As propostas já chegam considerando essa escolha.',
        ],
        [
            'q' => 'Como o profissional recebe pelo serviço?',
            'a' => 'O profissional cadastra chave PIX ou dados bancários no perfil, e o acerto é feito com o cliente sobre o valor da proposta aceita.',
        ],
        [
            'q' => 'A plataforma funciona na minha cidade?',
            'a' => 'A solicitação usa CEP, endereço e coordenadas para localizar o serviço, e cada profissional define as regiões em que atende. Você vê propostas de quem realmente cobre o seu endereço.',
        ],
    ];
@endphp

<section id="duvidas" class="py-24 md:py-32">
    <div class="shell grid gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-4">
            <span class="eyebrow" data-reveal>Dúvidas</span>
            <h2 class="display mt-5 text-4xl text-ink-800 md:text-[2.75rem]" data-reveal style="--reveal-delay:60ms">
                Perguntas que
                <span class="serif text-brand-600">sempre chegam.</span>
            </h2>
            <p class="mt-6 text-[0.9375rem] leading-relaxed text-muted" data-reveal style="--reveal-delay:120ms">
                Não achou a sua? Fale com a gente em
                <a href="mailto:contato@proservico.com.br" class="font-semibold text-brand-600 underline decoration-brand-200 underline-offset-4 hover:decoration-brand-500">contato@proservico.com.br</a>.
            </p>
        </div>

        <div class="lg:col-span-8">
            <div class="divide-y divide-line border-y border-line">
                @foreach ($faq as $item)
                    <details class="faq-item group" data-reveal style="--reveal-delay:{{ $loop->index * 50 }}ms">
                        <summary class="flex items-start justify-between gap-6 py-6">
                            <h3 class="text-[1.0625rem] leading-snug font-semibold tracking-tight text-ink-800 transition-colors group-hover:text-brand-600">
                                {{ $item['q'] }}
                            </h3>
                            <span class="faq-sign grid size-8 flex-none place-items-center rounded-full border border-line text-muted">
                                <x-icon name="plus" class="size-4" :stroke="2" />
                            </span>
                        </summary>
                        <p class="max-w-2xl pr-14 pb-7 text-[0.9375rem] leading-relaxed text-muted">
                            {{ $item['a'] }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>
    </div>
</section>
