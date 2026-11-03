@props(['settings' => null])
@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
@endphp

<!-- SEÇÃO 01: INSTITUCIONAL & FUNDADOR (SOBRE NÓS) -->
<section class="w-full bg-surface-subtle py-space-3xl" id="sobre">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
        <!-- Section Header -->
        <div class="flex flex-col mb-space-2xl">
            <span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.25em] mb-space-xs">01 — SOBRE NÓS</span>
            <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary max-w-3xl leading-tight">
                Advocacia de excelência fundada em relações de confiança e proximidade.
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
            <!-- Retrato Real do Fundador -->
            <div class="lg:col-span-5 flex flex-col">
                <div class="relative w-full aspect-[4/5] bg-surface-container overflow-hidden shadow-md border border-border-light group">
                    <img
                        class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105"
                        alt="{{ $settings->about_founder_name }} - {{ $settings->site_title }}"
                        src="{{ asset('img/souza-foto.jpeg') }}"
                    >
                    <div class="absolute bottom-0 inset-x-0 p-space-md bg-gradient-to-t from-primary-container/90 via-primary-container/60 to-transparent">
                        <span class="font-headline-sm text-headline-sm text-surface-bright block leading-tight">
                            {{ $settings->about_founder_name }}
                        </span>
                        <span class="font-caption text-caption text-secondary-fixed uppercase tracking-wider block mt-0.5">
                            {{ $settings->about_founder_title }}
                        </span>
                    </div>
                </div>

                <div class="bg-surface-container-lowest p-space-md mt-space-sm flex items-center justify-between shadow-sm border border-border-light">
                    <div class="flex items-center gap-space-xs">
                        <span class="material-symbols-outlined text-secondary text-[20px]">verified</span>
                        <span class="font-body-sm text-body-sm text-on-surface font-medium">{{ $settings->about_founder_oab }}</span>
                    </div>
                    <span class="font-caption text-caption text-text-muted">Gravataí • RS</span>
                </div>
            </div>

            <!-- Narrativa e Conteúdo Oficial -->
            <div class="lg:col-span-7 flex flex-col gap-space-xl">
                <!-- Bloco Apresentação Oficial -->
                <div class="bg-surface-container-lowest p-space-xl shadow-sm border border-border-light">
                    <div class="inline-flex items-center gap-space-xs text-secondary mb-space-sm">
                        <span class="material-symbols-outlined text-[18px]">history_edu</span>
                        <span class="font-label-caps text-label-caps tracking-widest uppercase">Nossa Trajetória</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-space-md leading-snug">
                        {{ $settings->about_founder_name }}
                    </h3>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-space-md">
                        {{ $settings->about_text_1 }}
                    </p>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-space-lg">
                        {{ $settings->about_text_2 }}
                    </p>
                    <a
                        href="{{ $settings->whatsapp_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-space-lg py-space-sm bg-primary-container text-on-primary font-body-sm text-body-sm font-semibold uppercase tracking-wider hover:bg-surface-tint transition-colors"
                    >
                        <span>Vamos Conversar</span>
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>

                <!-- Bloco Diferencial Metodológico -->
                <div class="bg-surface-container-lowest p-space-xl shadow-sm border border-border-light">
                    <div class="inline-flex items-center gap-space-xs text-secondary mb-space-sm">
                        <span class="material-symbols-outlined text-[18px]">psychology</span>
                        <span class="font-label-caps text-label-caps tracking-widest uppercase">Diferencial de Atendimento</span>
                    </div>
                    @if($settings->about_quote)
                        <div class="pl-space-lg my-space-md bg-surface-subtle p-space-md border-l-2 border-secondary">
                            <blockquote class="font-editorial-quote text-editorial-quote text-primary italic leading-snug">
                                {{ $settings->about_quote }}
                            </blockquote>
                            @if($settings->about_quote_author)
                                <cite class="block font-label-caps text-label-caps text-secondary uppercase tracking-widest mt-space-sm not-italic">
                                    {{ $settings->about_quote_author }}
                                </cite>
                            @endif
                        </div>
                    @endif
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        Rejeitamos o modelo de advocacia de massa impessoal. Cada cliente mantém contato direto com o profissional responsável pela condução de sua causa, garantindo confidencialidade absoluta e estratégias jurídicas desenhadas sob medida.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
