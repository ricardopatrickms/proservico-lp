{{-- Simulação da tela "detalhe do serviço" do app cliente. Puramente decorativa. --}}
<div class="bg-mist pt-9 pb-6" aria-hidden="true">

    {{-- Barra do app --}}
    <div class="flex items-center justify-between px-5 pt-2 pb-4">
        <div class="flex items-center gap-2">
            <span class="grid size-7 place-items-center rounded-lg bg-white text-ink-800 shadow-sm">
                <svg viewBox="0 0 24 24" class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m14 6-6 6 6 6"/></svg>
            </span>
            <span class="text-[0.8125rem] font-semibold text-ink-800">Meu serviço</span>
        </div>
        <span class="grid size-7 place-items-center rounded-full bg-brand-500 text-[0.625rem] font-bold text-white">AR</span>
    </div>

    <div class="space-y-3 px-4">

        {{-- Cartão da solicitação --}}
        <div class="rounded-2xl border border-line bg-white p-4">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-[0.9375rem] leading-tight font-bold text-ink-800">Trocar tomada da sala</p>
                    <p class="mt-1 text-[0.6875rem] text-muted">Rua das Acácias, 240 · Centro</p>
                </div>
                <span class="flex-none rounded-full bg-brand-50 px-2 py-1 text-[0.5625rem] font-bold tracking-wide text-brand-700 uppercase">
                    Em aberto
                </span>
            </div>

            <div class="mt-3 flex flex-wrap gap-1.5">
                <span class="rounded-md bg-mist px-2 py-1 text-[0.625rem] font-medium text-body">Eletricista</span>
                <span class="rounded-md bg-mist px-2 py-1 text-[0.625rem] font-medium text-body">Hoje · Tarde</span>
                <span class="rounded-md bg-mist px-2 py-1 text-[0.625rem] font-medium text-body">Aceita negociar</span>
            </div>

            <div class="mt-3.5 flex items-end justify-between border-t border-line pt-3">
                <div>
                    <p class="text-[0.5625rem] font-semibold tracking-[0.12em] text-muted uppercase">Orçamento</p>
                    <p class="mt-0.5 text-sm font-bold text-ink-800">R$ 120 – R$ 200</p>
                </div>
                <div class="flex gap-1.5">
                    <span class="size-8 rounded-lg bg-gradient-to-br from-brand-200 to-brand-400"></span>
                    <span class="size-8 rounded-lg bg-gradient-to-br from-ink-600 to-ink-800"></span>
                    <span class="grid size-8 place-items-center rounded-lg border border-dashed border-line text-[0.625rem] font-semibold text-muted">+2</span>
                </div>
            </div>
        </div>

        {{-- Propostas --}}
        <div class="flex items-center justify-between px-1 pt-1">
            <p class="text-[0.75rem] font-bold text-ink-800">3 propostas</p>
            <span class="text-[0.625rem] font-semibold text-brand-600">Ver todas</span>
        </div>

        <div class="rounded-2xl border-2 border-brand-500 bg-white p-3.5 shadow-[0_12px_24px_-16px_rgba(59,158,255,0.9)]">
            <div class="flex items-center gap-2.5">
                <span class="grid size-9 flex-none place-items-center rounded-full bg-ink-800 text-[0.6875rem] font-bold text-white">CM</span>
                <div class="min-w-0 flex-1">
                    <p class="truncate text-[0.8125rem] font-semibold text-ink-800">Carlos Mendes</p>
                    <p class="flex items-center gap-1 text-[0.625rem] text-muted">
                        <svg viewBox="0 0 24 24" class="size-2.5 text-amber-400" fill="currentColor"><path d="m12 3.5 2.7 5.5 6 .9-4.35 4.25L17.4 20 12 17.15 6.6 20l1.05-5.85L3.3 9.9l6-.9Z"/></svg>
                        4,9 · 132 serviços
                    </p>
                </div>
                <p class="flex-none text-sm font-bold text-ink-800">R$ 150</p>
            </div>
            <p class="mt-2.5 text-[0.6875rem] leading-relaxed text-muted">
                “Levo o material e resolvo hoje mesmo. Garantia de 90 dias.”
            </p>
            <div class="mt-3 grid grid-cols-2 gap-2">
                <span class="grid h-8 place-items-center rounded-lg bg-brand-500 text-[0.6875rem] font-semibold text-white">Aceitar</span>
                <span class="grid h-8 place-items-center rounded-lg border border-line text-[0.6875rem] font-semibold text-body">Conversar</span>
            </div>
        </div>

        <div class="rounded-2xl border border-line bg-white p-3.5">
            <div class="flex items-center gap-2.5">
                <span class="grid size-9 flex-none place-items-center rounded-full bg-accent-500 text-[0.6875rem] font-bold text-white">JS</span>
                <div class="min-w-0 flex-1">
                    <p class="truncate text-[0.8125rem] font-semibold text-ink-800">Juliana Souza</p>
                    <p class="flex items-center gap-1 text-[0.625rem] text-muted">
                        <svg viewBox="0 0 24 24" class="size-2.5 text-amber-400" fill="currentColor"><path d="m12 3.5 2.7 5.5 6 .9-4.35 4.25L17.4 20 12 17.15 6.6 20l1.05-5.85L3.3 9.9l6-.9Z"/></svg>
                        4,8 · 87 serviços
                    </p>
                </div>
                <p class="flex-none text-sm font-bold text-ink-800">R$ 180</p>
            </div>
        </div>
    </div>
</div>
