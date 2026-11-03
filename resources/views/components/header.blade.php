@props(['settings' => null])
@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
@endphp

<header class="fixed top-0 inset-x-0 z-50 bg-surface/90 backdrop-blur-md shadow-[0_1px_8px_rgba(0,0,0,0.04)]" id="main-header">
    <div class="h-20 max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin flex items-center justify-between gap-gutter">
        <!-- Logo Oficial -->
        <a class="group flex items-center gap-3 focus:outline-none" href="{{ route('home') }}">
            <img
                src="{{ asset('img/logo.jpeg') }}"
                alt="{{ $settings->site_title }}"
                class="h-12 w-auto object-contain transition-transform group-hover:scale-105"
            >
            <div class="flex flex-col justify-center">
                <span class="font-headline-sm text-headline-sm text-primary tracking-tight leading-none transition-colors group-hover:text-secondary">
                    {{ $settings->site_title }}
                </span>
                <span class="font-label-caps text-label-caps text-secondary tracking-[0.22em] uppercase mt-1">
                    {{ $settings->site_subtitle }}
                </span>
            </div>
        </a>

        <!-- Navegação Desktop -->
        <nav aria-label="Navegação institucional principal" class="hidden lg:flex items-center gap-space-lg">
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('home') }}#home">Home</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('home') }}#sobre">Sobre Nós</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('home') }}#servicos">Serviços</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('articles.index') }}">Artigos</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('home') }}#contato">Contato</a>
        </nav>

        <!-- CTA & Ações -->
        <div class="flex items-center gap-space-md">
            <a
                class="hidden sm:inline-flex items-center justify-center px-space-md py-space-sm bg-primary-container text-on-primary font-body-sm text-body-sm tracking-wide uppercase transition-colors hover:bg-surface-tint focus:outline-none"
                href="{{ $settings->whatsapp_url }}"
                target="_blank"
                rel="noopener noreferrer"
            >
                Vamos Conversar
            </a>
            <a
                class="w-8 h-8 rounded-full bg-primary flex items-center justify-center shrink-0 text-on-primary hover:bg-secondary transition-colors"
                href="{{ route('admin.dashboard') }}"
                title="Painel Administrativo"
            >
                <span class="material-symbols-outlined text-[18px]">person</span>
            </a>

            <!-- Botão Menu Mobile -->
            <button
                type="button"
                id="mobile-menu-btn"
                class="lg:hidden p-2 text-primary hover:text-secondary transition-colors focus:outline-none"
                aria-label="Abrir menu principal"
                aria-expanded="false"
            >
                <span class="material-symbols-outlined text-[26px]" id="mobile-menu-icon">menu</span>
            </button>
        </div>
    </div>

    <!-- Gaveta Menu Mobile -->
    <div id="mobile-menu" class="hidden lg:hidden bg-surface-container-lowest border-t border-border-light px-margin-mobile py-space-lg shadow-xl">
        <nav class="flex flex-col gap-space-md">
            <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors py-1" href="{{ route('home') }}#home">Home</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors py-1" href="{{ route('home') }}#sobre">Sobre Nós</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors py-1" href="{{ route('home') }}#servicos">Serviços</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors py-1" href="{{ route('articles.index') }}">Artigos</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors py-1" href="{{ route('home') }}#contato">Contato</a>
            <div class="pt-space-sm border-t border-border-light flex flex-col gap-2">
                <a
                    class="inline-flex w-full items-center justify-center px-space-md py-space-sm bg-primary-container text-on-primary font-body-sm text-body-sm tracking-wide uppercase hover:bg-surface-tint transition-colors"
                    href="{{ $settings->whatsapp_url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Fale no WhatsApp
                </a>
            </div>
        </nav>
    </div>
</header>
