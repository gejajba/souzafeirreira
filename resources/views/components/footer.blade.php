@props(['settings' => null])
@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
@endphp

<footer class="w-full bg-primary-container text-surface-bright py-space-3xl">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-gutter pb-space-2xl border-b border-border-dark">
            <!-- Marca & Identidade -->
            <div class="lg:col-span-4 flex flex-col items-start">
                <a href="#home" class="flex items-center gap-3 mb-space-md">
                    <img
                        src="{{ asset('img/logo.jpeg') }}"
                        alt="{{ $settings->site_title }}"
                        class="h-12 w-auto object-contain rounded bg-white p-1"
                    >
                    <div>
                        <div class="font-headline-md text-headline-md text-surface-bright leading-none tracking-tight">
                            {{ $settings->site_title }}
                        </div>
                        <div class="font-label-caps text-label-caps text-secondary-fixed-dim uppercase tracking-[0.2em] mt-1">
                            {{ $settings->site_subtitle }}
                        </div>
                    </div>
                </a>

                <p class="font-body-sm text-body-sm text-on-primary-container max-w-sm leading-relaxed mb-space-lg">
                    Prática jurídica pautada pela proximidade, confiança e excelência estratégica, com atendimento direto em Gravataí/RS e abrangência nacional.
                </p>
            </div>

            <!-- Navegação -->
            <div class="lg:col-span-3 flex flex-col">
                <h3 class="font-label-caps text-label-caps text-secondary-fixed-dim uppercase tracking-widest mb-space-md">
                    Navegação
                </h3>
                <ul class="flex flex-col gap-space-xs">
                    <li class="leading-normal">
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-surface-bright transition-colors" href="{{ route('home') }}#home">Home</a>
                    </li>
                    <li class="leading-normal">
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-surface-bright transition-colors" href="{{ route('home') }}#sobre">Sobre Nós</a>
                    </li>
                    <li class="leading-normal">
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-surface-bright transition-colors" href="{{ route('home') }}#equipe">Equipe</a>
                    </li>
                    <li class="leading-normal">
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-surface-bright transition-colors" href="{{ route('home') }}#servicos">Serviços</a>
                    </li>
                    <li class="leading-normal">
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-surface-bright transition-colors" href="{{ route('articles.index') }}">Artigos Jurídicos</a>
                    </li>
                    <li class="leading-normal">
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-surface-bright transition-colors" href="{{ route('home') }}#contato">Contato</a>
                    </li>
                    <li class="leading-normal">
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-surface-bright transition-colors" href="{{ route('lgpd') }}">Privacidade de Dados (LGPD)</a>
                    </li>
                </ul>
            </div>

            <!-- Sede & Contatos Oficiais -->
            <div class="lg:col-span-5 flex flex-col justify-between">
                <div class="flex flex-col">
                    <h3 class="font-label-caps text-label-caps text-secondary-fixed-dim uppercase tracking-widest mb-space-md">
                        Sede &amp; Atendimento
                    </h3>
                    <div class="flex flex-col gap-space-md">
                        <a
                            href="https://www.google.com/maps/search/?api=1&query={{ urlencode($settings->address) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-start gap-space-sm p-3 -m-3 rounded border border-transparent hover:border-border-dark hover:bg-tertiary-container/30 transition-all focus:outline-none"
                            title="Ver localização no Google Maps"
                        >
                            <span class="material-symbols-outlined text-secondary-fixed-dim text-[22px] shrink-0 mt-0.5 group-hover:text-surface-bright transition-colors">location_on</span>
                            <div class="font-body-sm text-body-sm text-on-primary-container leading-relaxed">
                                <div class="flex items-center gap-1.5 text-surface-bright font-medium">
                                    <span>Gravataí / Rio Grande do Sul</span>
                                    <span class="material-symbols-outlined text-[15px] text-secondary-fixed-dim group-hover:text-surface-bright transition-transform group-hover:translate-x-0.5">open_in_new</span>
                                </div>
                                <span class="group-hover:text-surface-bright transition-colors">{{ $settings->address }}</span><br>
                                <span class="text-caption text-secondary-fixed-dim group-hover:underline flex items-center gap-1 mt-1 font-medium">
                                    <span class="material-symbols-outlined text-[15px]">map</span>
                                    Abrir endereço no mapa (Google Maps) &rarr;
                                </span>
                            </div>
                        </a>

                        <div class="flex items-start gap-space-sm">
                            <span class="material-symbols-outlined text-secondary-fixed-dim text-[20px] shrink-0 mt-0.5">chat</span>
                            <div class="font-body-sm text-body-sm text-on-primary-container">
                                <span class="text-surface-bright font-medium block">Canal WhatsApp Oficial</span>
                                <a
                                    class="text-on-primary-container hover:text-surface-bright transition-colors underline decoration-border-dark underline-offset-4"
                                    href="{{ $settings->whatsapp_url }}"
                                    rel="noopener noreferrer"
                                    target="_blank"
                                >
                                    WhatsApp: {{ $settings->phone }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-space-sm">
                            <span class="material-symbols-outlined text-secondary-fixed-dim text-[20px] shrink-0 mt-0.5">mail</span>
                            <div class="font-body-sm text-body-sm text-on-primary-container">
                                <span class="text-surface-bright font-medium block">Correspondência Digital</span>
                                <a class="hover:text-surface-bright transition-colors" href="mailto:{{ $settings->email }}">
                                    {{ $settings->email }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Linha Inferior -->
        <div class="pt-space-xl flex flex-col md:flex-row items-center justify-between gap-space-md text-center sm:text-left">
            <div class="flex flex-col sm:flex-row items-center gap-space-sm sm:gap-space-md">
                <p class="font-caption text-caption text-on-primary-container">
                    Todos os direitos reservados. {{ $settings->site_title }} &copy; {{ date('Y') }}.
                </p>
                <span class="hidden sm:inline text-on-primary-container text-caption">•</span>
                <p class="font-caption text-caption text-on-primary-container">
                    Feito pela <span class="text-surface-bright font-medium">Legis Studio</span>.
                </p>
            </div>
            <div class="flex items-center gap-space-lg">
                <a class="font-caption text-caption text-on-primary-container hover:text-surface-bright transition-colors" href="{{ route('lgpd') }}">
                    Privacidade de Dados (LGPD)
                </a>
            </div>
        </div>
    </div>
</footer>
