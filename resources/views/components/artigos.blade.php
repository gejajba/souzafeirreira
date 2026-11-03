@props(['articles' => null])
@php
    $articles = $articles ?? \App\Models\Article::active()->ordered()->get();
@endphp

<!-- SEÇÃO 04: ARTIGOS & ANÁLISES (CONHECIMENTO JURÍDICO) -->
<section class="w-full bg-surface-subtle py-space-3xl" id="conteudos">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-2xl gap-space-md">
            <div>
                <span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.25em] mb-space-xs block">03 — ARTIGOS E ANÁLISES</span>
                <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary leading-tight">
                    Conhecimento Jurídico e Informação
                </h2>
            </div>
            <div class="flex flex-col items-start md:items-end gap-2">
                <p class="font-body-sm text-body-sm text-on-surface-variant max-w-sm">
                    Análises jurídicas orientadas à elucidação de direitos e proteção preventiva de patrimônio.
                </p>
                <a
                    href="{{ route('articles.index') }}"
                    class="text-xs font-semibold uppercase tracking-wider text-secondary hover:text-primary transition-colors inline-flex items-center gap-1"
                >
                    <span>Ver todas as publicações</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            @foreach($articles as $article)
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
                        <h3 class="font-headline-sm text-headline-sm text-primary mb-space-sm leading-snug group-hover:text-secondary transition-colors">
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-space-lg">
                            {{ $article->summary }}
                        </p>
                    </div>
                    <div class="pt-space-md flex items-center justify-between border-t border-border-light">
                        <span class="text-caption text-text-muted">{{ $article->readingTime() }} min de leitura</span>
                        <a
                            href="{{ route('articles.show', $article) }}"
                            class="font-body-sm text-body-sm text-primary font-semibold group-hover:text-secondary transition-colors inline-flex items-center gap-1"
                        >
                            <span>Ler artigo completo</span>
                            <span class="material-symbols-outlined text-[18px] text-secondary group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
