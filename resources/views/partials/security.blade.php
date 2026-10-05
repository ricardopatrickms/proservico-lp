@php
    $documents = [
        ['icon' => 'file', 'title' => 'RG ou CNH', 'text' => 'Documento oficial com foto para confirmar que a pessoa é quem diz ser.'],
        ['icon' => 'badge', 'title' => 'Certificado profissional', 'text' => 'A comprovação de que existe formação ou qualificação por trás do serviço.'],
        ['icon' => 'shield', 'title' => 'Antecedentes criminais', 'text' => 'Certidão obrigatória — ela entra na análise antes de qualquer aprovação.'],
        ['icon' => 'user-check', 'title' => 'Foto de perfil', 'text' => 'O rosto que vai bater à sua porta aparece no perfil desde o primeiro contato.'],
    ];
@endphp

<section id="seguranca" class="bg-ink relative isolate overflow-hidden py-24 md:py-32">
    <div class="shell relative">
        <div class="grid gap-14 lg:grid-cols-12 lg:gap-16">

            <div class="lg:col-span-5">
                <span class="eyebrow eyebrow-invert" data-reveal>Confiança</span>
                <h2 class="display mt-5 text-4xl text-white md:text-5xl" data-reveal style="--reveal-delay:60ms">
                    Ninguém atende
                    <span class="serif block text-brand-300">sem passar por aqui.</span>
                </h2>
                <p class="lede mt-6 max-w-md text-white/60" data-reveal style="--reveal-delay:120ms">
                    Cadastro de profissional não é autoatendimento. Quatro documentos são obrigatórios e
                    um humano aprova cada perfil antes de ele aparecer para qualquer cliente.
                </p>

                <div class="mt-10 flex items-center gap-4 rounded-2xl border border-white/10 bg-white/5 p-5"
                     data-reveal style="--reveal-delay:180ms">
                    <span class="grid size-11 flex-none place-items-center rounded-xl bg-accent-500/15 text-accent-400">
                        <x-icon name="lock" />
                    </span>
                    <p class="text-sm leading-relaxed text-white/70">
                        Documentos ficam em armazenamento privado e são acessados apenas pela equipe de aprovação.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach ($documents as $doc)
                        <article class="glass p-6" data-reveal style="--reveal-delay:{{ $loop->index * 70 }}ms">
                            <span class="grid size-10 place-items-center rounded-xl bg-white/8 text-brand-300">
                                <x-icon :name="$doc['icon']" />
                            </span>
                            <h3 class="mt-5 text-base font-bold tracking-tight text-white">{{ $doc['title'] }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-white/55">{{ $doc['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
