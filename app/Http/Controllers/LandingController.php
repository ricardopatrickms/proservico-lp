<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class LandingController extends Controller
{
    /** @var list<string> */
    private const ICONS = ['home', 'tools', 'bolt', 'briefcase', 'users', 'star'];

    public function __invoke(): View
    {
        return view('landing', [
            'categoryGroups' => $this->categoryGroups(),
        ]);
    }

    /**
     * @return list<array{icon: string, name: string, items: list<string>}>
     */
    private function categoryGroups(): array
    {
        $fallback = $this->fallbackGroups();
        $baseUrl = rtrim((string) config('services.proservico_api.base_url'), '/');

        if ($baseUrl === '') {
            return $fallback;
        }

        try {
            return Cache::remember('landing.category_groups', now()->addMinutes(5), function () use ($baseUrl, $fallback) {
                $response = Http::timeout(5)
                    ->acceptJson()
                    ->get("{$baseUrl}/service-categories");

                if (! $response->successful()) {
                    Log::warning('Landing: falha ao buscar categorias', [
                        'status' => $response->status(),
                    ]);

                    return $fallback;
                }

                $groups = [];
                foreach ($response->json() ?? [] as $index => $group) {
                    if (! is_array($group)) {
                        continue;
                    }

                    $name = trim((string) ($group['name'] ?? ''));
                    if ($name === '') {
                        continue;
                    }

                    $items = collect($group['children'] ?? [])
                        ->map(fn ($child) => is_array($child) ? trim((string) ($child['name'] ?? '')) : '')
                        ->filter()
                        ->values()
                        ->all();

                    if ($items === []) {
                        continue;
                    }

                    $groups[] = [
                        'icon' => $this->iconFor($name, (int) $index),
                        'name' => $name,
                        'items' => $items,
                    ];
                }

                return $groups !== [] ? $groups : $fallback;
            });
        } catch (\Throwable $e) {
            Log::warning('Landing: erro ao buscar categorias', [
                'message' => $e->getMessage(),
            ]);

            return $fallback;
        }
    }

    private function iconFor(string $name, int $index): string
    {
        $normalized = mb_strtolower($name);

        return match (true) {
            str_contains($normalized, 'domést') || str_contains($normalized, 'domest') => 'home',
            str_contains($normalized, 'reforma') || str_contains($normalized, 'manuten') => 'tools',
            str_contains($normalized, 'clima') || str_contains($normalized, 'ar-cond') => 'bolt',
            default => self::ICONS[$index % count(self::ICONS)],
        };
    }

    /**
     * @return list<array{icon: string, name: string, items: list<string>}>
     */
    private function fallbackGroups(): array
    {
        return [
            [
                'icon' => 'home',
                'name' => 'Serviços Domésticos',
                'items' => ['Diarista', 'Faxineira', 'Passadeira', 'Lavadeira', 'Cozinheira', 'Babá', 'Cuidador de idosos', 'Pet sitter', 'Dog walker', 'Jardinagem'],
            ],
            [
                'icon' => 'tools',
                'name' => 'Reformas e Manutenção',
                'items' => ['Eletricista', 'Encanador', 'Pintor', 'Pedreiro', 'Montagem de móveis'],
            ],
            [
                'icon' => 'bolt',
                'name' => 'Climatização',
                'items' => ['Instalação de ar-condicionado', 'Manutenção de ar-condicionado'],
            ],
        ];
    }
}
