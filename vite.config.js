import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

// No Docker o Vite escuta em 0.0.0.0, mas quem baixa os assets é o browser no
// host: sem isso o `public/hot` sairia como http://0.0.0.0:5174 e o WebSocket
// do HMR tentaria o mesmo endereço. Fora do Docker a variável não existe e o
// comportamento padrão continua valendo.
const hmrHost = process.env.VITE_HMR_HOST;

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600, 700],
                }),
                bunny('Instrument Serif', {
                    weights: [400],
                    styles: ['normal', 'italic'],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        hmr: hmrHost ? { host: hmrHost } : undefined,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
