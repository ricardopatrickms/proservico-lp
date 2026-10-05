# Landing page (Laravel 13 + Blade + Tailwind v4) — imagem de desenvolvimento.
#
# O container roda dois processos: o `artisan serve` (8001) e o dev server do
# Vite (5174). Os dois são necessários porque o `@vite` do Blade lê o
# `public/hot` e manda o browser buscar CSS/JS direto no Vite.
FROM php:8.4-cli-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    curl \
    ca-certificates \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    && docker-php-ext-install -j$(nproc) mbstring zip bcmath exif pcntl intl \
    && rm -rf /var/lib/apt/lists/*

# Node 22 para o Vite 8 / Tailwind 4 (o Vite 8 exige ^20.19 || >=22.12).
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 8001 5174

ENTRYPOINT ["entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8001", "--no-reload"]
