<x-layouts.app
    :title="'Artigos & Publicações Jurídicas | ' . $settings->site_title"
    :description="'Análises jurídicas, teses judiciais e orientações preventivas em direito bancário, trabalhista, previdenciário e cível por Souza Pereira Advocacia.'"
    :canonical="route('articles.index')"
    :keywords="'artigos jurídicos, publicações oab, teses stj, direito bancário gravataí, advocacia consultiva'"
    :settings="$settings"
>
    <x-header :settings="$settings" />

    <main class="w-full pt-28 pb-space-3xl bg-surface min-h-[calc(100vh-20rem)]">
        <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
            <!-- Cabeçalho da Seção -->
            <div class="mb-space-xl">
                <div class="inline-flex items-center gap-space-xs text-secondary font-label-caps text-label-caps tracking-[0.25em] uppercase mb-space-xs">
                    <span>Conteúdos &amp; Informação</span>
                </div>
                <h1 class="font-display text-display-mobile md:text-headline-lg text-primary tracking-tight leading-tight mb-space-sm">
                    Artigos &amp; Análises Jurídicas
                </h1>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl leading-relaxed">
                    Artigos orientados à elucidação de direitos, teses consolidadas nos tribunais superiores e orientações preventivas para pessoas físicas e jurídicas.
                </p>
            </div>

            <!-- Filtros por Categoria -->
            @if($categories->count() > 1)
                <div class="flex flex-wrap items-center gap-2 mb-space-2xl pb-space-md border-b border-border-light">
                    <a
                        href="{{ route('articles.index') }}"
                        class="px-4 py-1.5 text-xs font-semibold rounded-none uppercase tracking-wider transition-colors {{ !request('categoria') ? 'bg-primary-container text-on-primary' : 'bg-surface-subtle text-primary hover:bg-surface-container-high' }}"
                    >
                        Todas as Categorias
                    </a>
                    @foreach($categories as $cat)
                        <a
                            href="{{ route('articles.index', ['categoria' => $cat]) }}"
                            class="px-4 py-1.5 text-xs font-semibold rounded-none uppercase tracking-wider transition-colors {{ request('categoria') === $cat ? 'bg-primary-container text-on-primary' : 'bg-surface-subtle text-primary hover:bg-surface-container-high' }}"
                        >
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- Grid de Artigos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                @forelse($articles as $article)
                    <article class="bg-surface-container-lowest flex flex-col justify-between p-space-xl shadow-sm hover:shadow-md transition-shadow border border-border-light group">
                        <div>
                            <div class="flex items-center justify-between mb-space-md">
                                <span class="px-space-xs py-0.5 bg-surface-subtle text-secondary font-label-caps text-label-caps uppercase tracking-wider">
                                    {{ $article->category }}
                                </span>
                                @if($article->tag)
                                    <span class="font-caption text-caption text-text-muted">{{ $article->tag }}</span>
                                @endif
                            </div>

                            <h2 class="font-headline-sm text-headline-sm text-primary mb-space-sm leading-snug group-hover:text-secondary transition-colors">
                                <a href="{{ route('articles.show', $article) }}">
                                    {{ $article->title }}
                                </a>
                            </h2>

                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-space-lg">
                                {{ $article->summary }}
                            </p>
                        </div>

                        <div class="pt-space-md flex items-center justify-between border-t border-border-light">
                            <div class="flex items-center gap-2 text-caption text-text-muted">
                                <span class="material-symbols-outlined text-[16px]">schedule</span>
                                <span>{{ $article->readingTime() }} min de leitura</span>
                            </div>
                            <a
                                href="{{ route('articles.show', $article) }}"
                                class="inline-flex items-center gap-1 font-body-sm text-body-sm text-primary font-semibold group-hover:text-secondary transition-colors"
                            >
                                <span>Ler artigo</span>
                                <span class="material-symbols-outlined text-[18px] text-secondary group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-16 text-center text-text-muted">
                        <span class="material-symbols-outlined text-[48px] text-text-muted mb-2 block">article</span>
                        Nenhum artigo encontrado nesta categoria.
                    </div>
                @endforelse
            </div>

            <!-- Paginação -->
            @if($articles->hasPages())
                <div class="mt-space-2xl pt-space-md border-t border-border-light">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>
    </main>

    <x-footer :settings="$settings" />
    <x-whatsapp-button :settings="$settings" />
</x-layouts.app>
