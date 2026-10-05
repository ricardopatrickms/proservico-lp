#!/bin/bash
# Prepara as dependências (o bind mount traz só o código-fonte) e sobe o Vite
# ao lado do processo do CMD.
set -e

cd /var/www/html

if [ ! -f vendor/autoload.php ]; then
  echo ">> Instalando dependências Composer..."
  composer install --prefer-dist --no-interaction
fi

# node_modules é volume nomeado: na primeira subida está vazio.
if [ ! -d node_modules/vite ]; then
  echo ">> Instalando dependências npm..."
  npm install --ignore-scripts
fi

if [ ! -f .env ] && [ -f .env.example ]; then
  cp .env.example .env
fi

if ! grep -q '^APP_KEY=base64:' .env 2>/dev/null; then
  echo ">> Gerando APP_KEY..."
  php artisan key:generate --force
fi

php artisan config:clear --quiet 2>/dev/null || true

vite_pid=""
app_pid=""

# O public/hot fica no bind mount: se sobrar um arquivo de uma execução
# anterior, o Blade aponta os assets para um dev server que não existe mais.
cleanup() {
  trap - TERM INT EXIT
  [ -n "$vite_pid" ] && kill "$vite_pid" 2>/dev/null || true
  [ -n "$app_pid" ] && kill "$app_pid" 2>/dev/null || true
  rm -f public/hot
}
trap cleanup TERM INT EXIT

if [ "${RUN_VITE:-true}" = "true" ]; then
  vite_port="${VITE_DEV_PORT:-5174}"
  echo ">> Subindo o Vite em 0.0.0.0:${vite_port} (browser: http://localhost:${vite_port})..."
  npm run dev -- --host 0.0.0.0 --port "$vite_port" --strictPort &
  vite_pid=$!
fi

"$@" &
app_pid=$!

# Se qualquer um dos dois cair, o container cai junto (o cleanup mata o outro).
wait -n
