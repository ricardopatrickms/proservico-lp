# ProServiço — Landing page

Site institucional da plataforma ProServiço, em Laravel 13 + Blade + Tailwind v4.
É uma página estática: **não usa banco de dados** (sessão, cache e fila rodam em
arquivo/sync).

## Rodar

Pelo Docker da raiz do projeto (`../docker-compose.yml`), junto com a API e o
Admin Hub:

```bash
docker compose up -d landing
docker compose logs -f landing
```

O container instala Composer e npm na primeira subida, gera a `APP_KEY` e sobe
os dois processos: `artisan serve` na 8001 e o Vite na 5174.

Ou localmente, sem Docker:

```bash
composer install
npm install
composer dev         # sobe Vite + servidor juntos
```

Ou separado, em dois terminais: `npm run dev` e `php artisan serve`.

> Rodar os dois ao mesmo tempo colide nas portas. O container, ao parar, apaga o
> `public/hot` — sem isso o Blade continuaria apontando os assets para o dev
> server do Vite do container.

A landing roda em **http://localhost:8001**. A porta 8000 e a 5173 são da API e do
Admin Hub (containers do `proservico`), então o `.env` fixa `SERVER_PORT=8001`
para não haver colisão — `php artisan serve` já sobe na porta certa sem `--port`.
No Docker o Vite também sai da 5173 e vai para a **5174**, pelo mesmo motivo.

A raiz `/` é a landing page (`LandingController`); não há outra rota.
O catálogo da seção Categorias vem de `GET {API_BASE_URL}/service-categories`
(com cache de 5 minutos e fallback estático se a API estiver fora).

Para produção:

```bash
npm run build
```

## Como a página é montada

```
routes/web.php                                  → Route::view('/', 'landing')
resources/views/landing.blade.php               → ordem das seções
resources/views/components/layouts/landing.blade.php  → <head>, SEO, header e footer
resources/views/components/icon.blade.php       → <x-icon name="..."> (SVGs inline)
resources/views/partials/                       → uma seção por arquivo
```

Seções, na ordem: `hero`, `categories`, `how-it-works`, `features`, `security`,
`professionals`, `platform`, `faq`, `cta`. O `app-preview` é o mockup da tela do
app usado dentro do hero.

O conteúdo de cada seção (listas de categorias, passos, recursos, FAQ) fica num
bloco `@php` no topo do próprio partial — para editar a copy, mexa lá.

## Design system

`resources/css/app.css` concentra os tokens em `@theme` e as classes de
componente (`.btn`, `.card`, `.chip`, `.eyebrow`, `.phone`, `.tab`, …).

A paleta é a mesma do app Flutter (`proservico/app/lib/theme`):

| Token | Valor | Uso |
|-------|-------|-----|
| `brand-500` | `#3B9EFF` | azul "Pro", ações de cliente |
| `accent-500` | `#E53935` | vermelho "Serviço", ações de profissional |
| `ink-800` | `#0A1F4D` | navy dos títulos e seções escuras |

Tipografia: **Instrument Sans** (texto) e **Instrument Serif** itálico (destaques),
servidas localmente pelo plugin de fontes do `laravel-vite-plugin` — os arquivos
são baixados no `npm run build` e versionados no `public/build`.

## Comportamento

`resources/js/app.js` cobre header com fundo ao rolar, menu mobile, as abas de
"Como funciona" e o reveal on scroll (`[data-reveal]`, via IntersectionObserver).
Tudo degrada bem: com `prefers-reduced-motion` o reveal é desligado e o conteúdo
aparece direto.

## O que ainda falta

Os CTAs (`Sou cliente`, `Sou profissional`, `Entrar`) apontam para `#comecar`.
Trocar pelos links reais das lojas ou do cadastro quando existirem.
