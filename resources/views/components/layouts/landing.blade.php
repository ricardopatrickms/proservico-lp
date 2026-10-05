<!DOCTYPE html>
<html lang="pt-BR" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#04091c">

    <title>{{ $title ?? 'ProServiço — conectando quem precisa a quem faz' }}</title>
    <meta name="description" content="{{ $description ?? 'Descreva o serviço, receba propostas de profissionais verificados da sua região e escolha pela melhor proposta. Serviços domésticos, reformas e climatização.' }}">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="ProServiço">
    <meta property="og:title" content="{{ $title ?? 'ProServiço — conectando quem precisa a quem faz' }}">
    <meta property="og:description" content="{{ $description ?? 'Descreva o serviço, receba propostas de profissionais verificados e escolha pela melhor proposta.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="/favicon.ico" sizes="32x32">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="canonical" href="{{ url()->current() }}">

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans">
    <a href="#conteudo"
       class="sr-only focus:not-sr-only focus:fixed focus:left-6 focus:top-6 focus:z-[60] focus:rounded-full focus:bg-white focus:px-5 focus:py-3 focus:text-sm focus:font-semibold focus:text-ink-800 focus:shadow-lg">
        Ir para o conteúdo
    </a>

    @include('partials.header')

    <main id="conteudo">
        {{ $slot }}
    </main>

    @include('partials.footer')
</body>
</html>
