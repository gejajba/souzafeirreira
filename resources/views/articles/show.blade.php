@php
    $articleSchema = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $article->title,
        'description' => $article->summary,
        'image' => $settings->hero_image_url,
        'datePublished' => ($article->published_at ?? $article->created_at)->toIso8601String(),
        'dateModified' => $article->updated_at->toIso8601String(),
        'author' => [
            '@type' => 'Person',
            'name' => $settings->about_founder_name,
            'jobTitle' => $settings->about_founder_title,
            'image' => $settings->about_founder_image_url,
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => $settings->site_title,
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('img/logo.jpeg'),
            ],
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => route('articles.show', $article),
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
@endphp

<x-layouts.app
    :title="$article->title"
    :description="$article->summary"
    :keywords="$article->category . ', ' . ($article->tag ? $article->tag . ', ' : '') . 'direito bancário, advogado gravataí, ' . $article->title"
    :canonical="route('articles.show', $article)"
    :ogType="'article'"
    :ogImage="$settings->hero_image_url"
    :settings="$settings"
>
    <x-slot:schema>
        <script type="application/ld+json">
        {!! $articleSchema !!}
        </script>
    </x-slot:schema>

    <x-header :settings="$settings" />

    <main class="w-full pt-28 pb-space-3xl bg-surface min-h-[calc(100vh-20rem)]">
        <article class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
            <!-- Breadcrumbs -->
            <nav aria-label="Navegação estrutural" class="mb-space-lg flex items-center gap-2 text-caption text-text-muted">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Início</a>
                <span>/</span>
                <a href="{{ route('articles.index') }}" class="hover:text-primary transition-colors">Conteúdos</a>
                <span>/</span>
                <a href="{{ route('articles.index', ['categoria' => $article->category]) }}" class="hover:text-primary transition-colors">{{ $article->category }}</a>
                <span>/</span>
                <span class="text-primary truncate max-w-xs md:max-w-md">{{ $article->title }}</span>
            </nav>

            <!-- Cabeçalho do Artigo -->
            <header class="max-w-4xl mb-space-2xl">
                <div class="flex flex-wrap items-center gap-3 mb-space-md">
                    <span class="px-space-sm py-1 bg-surface-subtle text-secondary font-label-caps text-label-caps uppercase tracking-wider">
                        {{ $article->category }}
                    </span>
                    @if($article->tag)
                        <span class="px-space-sm py-1 bg-surface-container text-text-muted font-caption text-caption uppercase tracking-wider">
                            {{ $article->tag }}
                        </span>
                    @endif
                    <div class="flex items-center gap-1.5 text-caption text-text-muted ml-auto">
                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                        <span>{{ $article->readingTime() }} min de leitura</span>
                    </div>
                </div>

                <h1 class="font-display text-display-mobile md:text-headline-lg text-primary tracking-tight leading-[1.12] mb-space-lg">
                    {{ $article->title }}
                </h1>

                <!-- Resumo Introdutório / Lead -->
                <div class="p-space-lg bg-surface-subtle border-l-4 border-secondary text-body-lg text-on-surface-variant leading-relaxed">
                    {{ $article->summary }}
                </div>

                <!-- Barra do Autor & Publicação -->
                <div class="mt-space-lg pt-space-md border-t border-border-light flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <img
                            src="{{ $settings->about_founder_image_url }}"
                            alt="{{ $settings->about_founder_name }}"
                            class="w-12 h-12 rounded-full object-cover object-top border border-secondary"
                        >
                        <div>
                            <span class="block font-headline-sm text-sm text-primary font-bold">
                                {{ $settings->about_founder_name }}
                            </span>
                            <span class="block font-caption text-xs text-text-muted">
                                {{ $settings->about_founder_title }} • {{ $settings->about_founder_oab }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 text-caption text-text-muted">
                        @if($article->published_at)
                            <time datetime="{{ $article->published_at->toISOString() }}" class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                                {{ $article->published_at->translatedFormat('d \d\e F \d\e Y') }}
                            </time>
                        @endif

                        <a
                            href="https://api.whatsapp.com/send/?phone=5551999201927&text={{ urlencode('Olá, li o artigo \"' . $article->title . '\" e gostaria de tirar uma dúvida.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary-container text-on-primary hover:bg-surface-tint transition-colors text-xs font-semibold uppercase tracking-wider"
                        >
                            <span class="material-symbols-outlined text-[16px]">chat</span>
                            Tirar Dúvida
                        </a>
                    </div>
                </div>
            </header>

            <!-- Layout do Conteúdo Principal + Lateral -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
                <!-- Corpo Editorial do Artigo -->
                <div class="lg:col-span-8 bg-surface-container-lowest p-space-xl lg:p-space-2xl border border-border-light shadow-sm">
                    <div class="article-content font-body-md text-on-surface text-base md:text-lg leading-relaxed space-y-6">
                        @if(!empty($article->content))
                            {!! Str::markdown($article->content) !!}
                        @else
                            <p class="text-on-surface-variant leading-relaxed">
                                {{ $article->summary }}
                            </p>
                            <p class="text-on-surface-variant leading-relaxed">
                                Para maiores orientações acerca deste tema e avaliação individualizada dos documentos do seu caso, entre em contato diretamente com nossa banca através de nossos canais oficiais.
                            </p>
                        @endif
                    </div>

                    <!-- Nota Ética CFOAB -->
                    <div class="mt-space-2xl pt-space-lg border-t border-border-light text-caption text-text-muted flex items-start gap-3">
                        <span class="material-symbols-outlined text-secondary text-[20px] shrink-0 mt-0.5">info</span>
                        <p class="leading-relaxed">
                            <strong>Aviso Legal &amp; Ético:</strong> Este artigo possui caráter estritamente informativo e pedagógico. Não substitui a consulta jurídica formal individualizada, visto que cada caso concreto demanda análise de suas peculiaridades fáticas e probatórias.
                        </p>
                    </div>
                </div>

                <!-- Coluna Lateral: Contato Direto & Resumo do Escritório -->
                <aside class="lg:col-span-4 space-y-6 sticky top-28">
                    <!-- Card de Consulta Imediata -->
                    <div class="bg-primary-container text-surface-bright p-space-xl border border-border-dark shadow-xl">
                        <span class="font-label-caps text-label-caps text-secondary-fixed uppercase tracking-wider block mb-2">
                            Assessoria Jurídica
                        </span>
                        <h3 class="font-headline-sm text-lg text-surface-bright font-bold mb-3 leading-snug">
                            Precisa de orientação sobre este assunto?
                        </h3>
                        <p class="font-body-sm text-body-sm text-on-primary-container leading-relaxed mb-6">
                            Nossa equipe atua com atenção próxima e atendimento direto pelo próprio advogado responsável. Converse conosco pelo WhatsApp ou agende uma consulta.
                        </p>
                        <a
                            href="https://api.whatsapp.com/send/?phone=5551999201927&text={{ urlencode('Olá Dr. Marcelo, li o artigo \"' . $article->title . '\" e gostaria de agendar uma consulta.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="w-full inline-flex items-center justify-center gap-2 py-3 bg-[#25D366] text-white font-body-sm text-sm font-semibold uppercase tracking-wider rounded hover:brightness-105 transition-all shadow-md"
                        >
                            <span class="material-symbols-outlined text-[20px]">chat</span>
                            Falar no WhatsApp
                        </a>

                        <div class="mt-6 pt-4 border-t border-border-dark text-xs text-on-primary-container space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-secondary-fixed text-[16px] shrink-0 mt-0.5">location_on</span>
                                <span>Gravataí / RS — Consultas presenciais e online</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary-fixed text-[16px] shrink-0">lock</span>
                                <span>Sigilo profissional e conformidade legal</span>
                            </div>
                        </div>
                    </div>

                    <!-- Compartilhamento & Ações -->
                    <div class="bg-surface-container-lowest p-space-lg border border-border-light shadow-sm text-xs">
                        <span class="font-bold uppercase tracking-wider text-primary block mb-3">Compartilhar Artigo</span>
                        <div class="flex items-center gap-2">
                            <a
                                href="https://api.whatsapp.com/send/?text={{ urlencode($article->title . ' - ' . url()->current()) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex-1 py-2 px-3 bg-surface-subtle hover:bg-surface-container-high text-primary font-medium flex items-center justify-center gap-1.5 transition-colors"
                            >
                                <span class="material-symbols-outlined text-[16px] text-[#25D366]">share</span>
                                WhatsApp
                            </a>
                            <button
                                type="button"
                                onclick="navigator.clipboard.writeText(window.location.href); alert('Link copiado para a área de transferência!');"
                                class="flex-1 py-2 px-3 bg-surface-subtle hover:bg-surface-container-high text-primary font-medium flex items-center justify-center gap-1.5 transition-colors"
                            >
                                <span class="material-symbols-outlined text-[16px] text-secondary">link</span>
                                Copiar Link
                            </button>
                        </div>
                    </div>
                </aside>
            </div>

            <!-- Seção de Artigos Relacionados -->
            @if($relatedArticles->isNotEmpty())
                <section class="mt-space-3xl pt-space-2xl border-t border-border-light">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-xl gap-4">
                        <div>
                            <span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.25em] mb-1 block">
                                Continue Lendo
                            </span>
                            <h2 class="font-headline-lg text-headline-sm md:text-headline-md text-primary font-bold">
                                Outras Análises &amp; Publicações
                            </h2>
                        </div>
                        <a href="{{ route('articles.index') }}" class="text-xs font-semibold uppercase tracking-wider text-secondary hover:underline flex items-center gap-1">
                            <span>Ver todos os artigos</span>
                            <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                        @foreach($relatedArticles as $related)
                            <article class="bg-surface-container-lowest flex flex-col justify-between p-space-xl shadow-sm hover:shadow-md transition-shadow border border-border-light group">
                                <div>
                                    <div class="flex items-center justify-between mb-space-md">
                                        <span class="px-space-xs py-0.5 bg-surface-subtle text-secondary font-label-caps text-label-caps uppercase tracking-wider">
                                            {{ $related->category }}
                                        </span>
                                        @if($related->tag)
                                            <span class="font-caption text-caption text-text-muted">{{ $related->tag }}</span>
                                        @endif
                                    </div>

                                    <h3 class="font-headline-sm text-headline-sm text-primary mb-space-sm leading-snug group-hover:text-secondary transition-colors">
                                        <a href="{{ route('articles.show', $related) }}">
                                            {{ $related->title }}
                                        </a>
                                    </h3>

                                    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-space-lg line-clamp-3">
                                        {{ $related->summary }}
                                    </p>
                                </div>

                                <div class="pt-space-md flex items-center justify-between border-t border-border-light">
                                    <span class="text-caption text-text-muted">{{ $related->readingTime() }} min</span>
                                    <a
                                        href="{{ route('articles.show', $related) }}"
                                        class="inline-flex items-center gap-1 font-body-sm text-body-sm text-primary font-semibold group-hover:text-secondary transition-colors"
                                    >
                                        <span>Ler artigo</span>
                                        <span class="material-symbols-outlined text-[18px] text-secondary group-hover:translate-x-1 transition-transform">arrow_forward</span>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif
        </article>
    </main>

    <x-footer :settings="$settings" />
    <x-whatsapp-button :settings="$settings" />
</x-layouts.app>
