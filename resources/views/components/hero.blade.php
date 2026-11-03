@props(['settings' => null])
@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
@endphp

<!-- HERO SECTION -->
<section class="relative w-full bg-surface py-space-2xl lg:py-space-3xl overflow-hidden" id="home">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">
            <!-- Coluna Esquerda: Texto Editorial & Métricas -->
            <div class="lg:col-span-7 flex flex-col items-start pr-0 lg:pr-space-lg">
                <div class="inline-flex items-center gap-space-xs px-space-sm py-1 bg-surface-subtle text-secondary font-label-caps text-label-caps tracking-[0.2em] uppercase rounded-none mb-space-lg">
                    <span class="w-1.5 h-1.5 bg-secondary rounded-full"></span>
                    {{ $settings->location_badge }}
                </div>

                <h1 class="font-display text-display-mobile md:text-display text-primary tracking-tight leading-[1.08] mb-space-lg">
                    {!! nl2br(e($settings->hero_title)) !!}
                </h1>

                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl leading-relaxed mb-space-xl">
                    {{ $settings->hero_subtitle }}
                </p>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-md w-full sm:w-auto mb-space-2xl">
                    <a
                        class="inline-flex items-center justify-center px-space-xl py-space-md bg-primary-container text-on-primary font-body-sm text-body-sm font-medium tracking-wide uppercase shadow-sm hover:bg-surface-tint transition-colors"
                        href="#servicos"
                    >
                        Confira nossos serviços
                    </a>
                    <a
                        class="inline-flex items-center justify-center gap-space-xs px-space-lg py-space-md bg-surface-subtle text-primary font-body-sm text-body-sm font-medium hover:bg-surface-container-high transition-colors"
                        href="{{ $settings->whatsapp_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <span>Vamos Conversar</span>
                        <span class="material-symbols-outlined text-[18px] text-secondary">chat</span>
                    </a>
                </div>

                <!-- Indicadores Estratégicos -->
                <div class="w-full grid grid-cols-3 gap-space-md pt-space-lg bg-surface-container-low p-space-md border border-border-light">
                    <div>
                        <span class="block font-label-index text-label-index text-primary font-bold">{{ $settings->metric_1_number }}</span>
                        <span class="font-caption text-caption text-text-muted uppercase tracking-wider block mt-0.5">{{ $settings->metric_1_label }}</span>
                    </div>
                    <div>
                        <span class="block font-label-index text-label-index text-primary font-bold">{{ $settings->metric_2_number }}</span>
                        <span class="font-caption text-caption text-text-muted uppercase tracking-wider block mt-0.5">{{ $settings->metric_2_label }}</span>
                    </div>
                    <div>
                        <span class="block font-label-index text-label-index text-primary font-bold">{{ $settings->metric_3_number }}</span>
                        <span class="font-caption text-caption text-text-muted uppercase tracking-wider block mt-0.5">{{ $settings->metric_3_label }}</span>
                    </div>
                </div>
            </div>

            <!-- Coluna Direita: Banner Oficial do Escritório -->
            <div class="lg:col-span-5 relative mt-space-lg lg:mt-0">
                <div class="relative w-full aspect-[4/5] bg-surface-container overflow-hidden shadow-xl border border-border-light group">
                    <picture>
                        @if(!$settings->hero_image)
                            <source srcset="{{ asset('img/banner-novo.png') }}" media="(min-width: 1024px)">
                            <source srcset="{{ asset('img/banner-mobile.png') }}" media="(min-width: 600px)">
                        @endif
                        <img
                            src="{{ $settings->hero_image_url }}"
                            alt="{{ $settings->site_title }} - Atendimento Jurídico Especializado"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        >
                    </picture>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/20 to-transparent"></div>
                    <div class="absolute bottom-0 inset-x-0 p-space-lg text-on-primary">
                        <span class="font-label-caps text-label-caps text-secondary-fixed tracking-[0.2em] uppercase block mb-1">
                            Atendimento Personalizado
                        </span>
                        <p class="font-body-sm text-body-sm text-surface-bright leading-snug">
                            {{ $settings->location_badge }} | Consultas online e assessoria presencial especializada.
                        </p>
                    </div>
                </div>

                <!-- Detalhe Flutuante de Confiança -->
                <div class="hidden sm:flex absolute -bottom-6 -left-6 bg-surface-container-lowest p-space-md shadow-lg max-w-xs items-center gap-space-sm border border-border-light">
                    <div class="w-10 h-10 bg-surface-subtle flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-secondary text-[22px]">balance</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-caption text-caption text-primary font-semibold">OAB/RS Inscrito</span>
                        <span class="font-caption text-caption text-text-muted">Conformidade e Sigilo Absoluto</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
