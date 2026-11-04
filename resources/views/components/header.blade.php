@props(['settings' => null])
@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
@endphp

<header class="fixed top-0 inset-x-0 z-50 bg-surface/90 backdrop-blur-md shadow-[0_1px_8px_rgba(0,0,0,0.04)]" id="main-header">
    <div class="h-16 sm:h-20 max-w-[1440px] mx-auto px-4 sm:px-margin-mobile md:px-space-xl lg:px-margin flex items-center justify-between gap-3 sm:gap-gutter">
        <!-- Logo Oficial -->
        <a class="group min-w-0 flex items-center gap-2 sm:gap-3 focus:outline-none" href="{{ route('home') }}">
            <img
                src="{{ asset('img/logo.jpeg') }}"
                alt="{{ $settings->site_title }}"
                class="h-10 sm:h-12 w-auto shrink-0 object-contain transition-transform group-hover:scale-105"
            >
            <div class="min-w-0 flex flex-col justify-center">
                <span class="font-headline-sm text-base sm:text-headline-sm text-primary tracking-tight leading-none truncate transition-colors group-hover:text-secondary">
                    {{ $settings->site_title }}
                </span>
                <span class="hidden min-[380px]:block font-label-caps text-label-caps text-secondary tracking-[0.16em] sm:tracking-[0.22em] uppercase mt-1">
                    {{ $settings->site_subtitle }}
                </span>
            </div>
        </a>

        <!-- Navegação Desktop -->
        <nav aria-label="Navegação institucional principal" class="hidden lg:flex items-center gap-space-lg">
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('home') }}#home">Home</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('home') }}#equipe">Nossa Equipe</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('home') }}#servicos">Serviços</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('articles.index') }}">Artigos</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors py-space-xs" href="{{ route('home') }}#contato">Contato</a>
        </nav>

        <!-- CTA & Ações -->
        <div class="flex shrink-0 items-center gap-1 sm:gap-space-md">
            <a
                class="hidden sm:inline-flex items-center justify-center px-space-md py-space-sm bg-primary-container text-on-primary font-body-sm text-body-sm tracking-wide uppercase transition-colors hover:bg-surface-tint focus:outline-none"
                href="{{ $settings->whatsapp_url }}"
                target="_blank"
                rel="noopener noreferrer"
            >
                Vamos Conversar
            </a>
            <a
                class="hidden sm:flex w-8 h-8 rounded-full bg-primary items-center justify-center shrink-0 text-on-primary hover:bg-secondary transition-colors"
                href="{{ route('admin.dashboard') }}"
                title="Painel Administrativo"
            >
                <span class="material-symbols-outlined text-[18px]">person</span>
            </a>

            <!-- Botão Menu Mobile -->
            <button
                type="button"
                id="mobile-menu-btn"
                class="lg:hidden min-h-11 min-w-11 inline-flex items-center justify-center rounded text-primary hover:bg-surface-subtle hover:text-secondary transition-colors focus:outline-none"
                aria-label="Abrir menu principal"
                aria-expanded="false"
            >
                <span class="material-symbols-outlined text-[26px]" id="mobile-menu-icon">menu</span>
            </button>
        </div>
    </div>

    <!-- Gaveta Menu Mobile -->
    <div id="mobile-menu" class="hidden lg:hidden max-h-[calc(100vh-4rem)] overflow-y-auto bg-surface-container-lowest border-t border-border-light px-4 sm:px-margin-mobile py-4 shadow-xl">
        <nav class="flex flex-col gap-1">
            <a class="font-body-md text-body-md text-on-surface-variant hover:bg-surface-subtle hover:text-primary transition-colors px-3 py-3" href="{{ route('home') }}#home">Home</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:bg-surface-subtle hover:text-primary transition-colors px-3 py-3" href="{{ route('home') }}#equipe">Nossa Equipe</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:bg-surface-subtle hover:text-primary transition-colors px-3 py-3" href="{{ route('home') }}#servicos">Serviços</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:bg-surface-subtle hover:text-primary transition-colors px-3 py-3" href="{{ route('articles.index') }}">Artigos</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:bg-surface-subtle hover:text-primary transition-colors px-3 py-3" href="{{ route('home') }}#contato">Contato</a>
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
