<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Painel Administrativo' }} | Souza Pereira Advocacia</title>

    <!-- Favicon Oficial Souza Pereira Advocacia -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface-container-low text-on-surface font-body-md min-h-screen flex antialiased">
    <!-- Sidebar -->
    <aside class="w-64 bg-primary-container text-surface-bright flex flex-col shrink-0 min-h-screen shadow-xl z-20">
        <!-- Logo do Painel -->
        <div class="h-20 px-6 flex items-center gap-3 border-b border-border-dark">
            <div class="w-9 h-9 rounded bg-secondary flex items-center justify-center text-on-secondary shrink-0 font-bold">
                SP
            </div>
            <div class="flex flex-col">
                <span class="font-headline-sm text-sm text-surface-bright font-bold leading-tight">Souza Pereira</span>
                <span class="font-caption text-[10px] text-secondary-fixed-dim uppercase tracking-wider">Painel de Controle</span>
            </div>
        </div>

        <!-- Links de Navegação -->
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <a
                href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded text-sm font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-tertiary-container text-surface-bright border-l-4 border-secondary' : 'text-on-primary-container hover:bg-tertiary-container/50 hover:text-surface-bright' }}"
            >
                <span class="material-symbols-outlined text-[20px]">dashboard</span>
                Dashboard
            </a>

            <a
                href="{{ route('admin.settings.edit') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded text-sm font-medium transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-tertiary-container text-surface-bright border-l-4 border-secondary' : 'text-on-primary-container hover:bg-tertiary-container/50 hover:text-surface-bright' }}"
            >
                <span class="material-symbols-outlined text-[20px]">settings</span>
                Configurações do Site
            </a>

            <a
                href="{{ route('admin.services.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded text-sm font-medium transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-tertiary-container text-surface-bright border-l-4 border-secondary' : 'text-on-primary-container hover:bg-tertiary-container/50 hover:text-surface-bright' }}"
            >
                <span class="material-symbols-outlined text-[20px]">gavel</span>
                Serviços &amp; Áreas
            </a>

            <a
                href="{{ route('admin.messages.index') }}"
                class="flex items-center justify-between px-3 py-2.5 rounded text-sm font-medium transition-colors {{ request()->routeIs('admin.messages.*') ? 'bg-tertiary-container text-surface-bright border-l-4 border-secondary' : 'text-on-primary-container hover:bg-tertiary-container/50 hover:text-surface-bright' }}"
            >
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px]">mail</span>
                    Mensagens
                </div>
                @php
                    $unreadMessages = \App\Models\ContactMessage::unread()->count();
                @endphp
                @if($unreadMessages > 0)
                    <span class="px-2 py-0.5 text-xs font-bold rounded-full bg-secondary text-on-secondary">
                        {{ $unreadMessages }}
                    </span>
                @endif
            </a>

            <a
                href="{{ route('admin.pillars.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded text-sm font-medium transition-colors {{ request()->routeIs('admin.pillars.*') ? 'bg-tertiary-container text-surface-bright border-l-4 border-secondary' : 'text-on-primary-container hover:bg-tertiary-container/50 hover:text-surface-bright' }}"
            >
                <span class="material-symbols-outlined text-[20px]">balance</span>
                Pilares de Conduta
            </a>

            <a
                href="{{ route('admin.articles.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded text-sm font-medium transition-colors {{ request()->routeIs('admin.articles.*') ? 'bg-tertiary-container text-surface-bright border-l-4 border-secondary' : 'text-on-primary-container hover:bg-tertiary-container/50 hover:text-surface-bright' }}"
            >
                <span class="material-symbols-outlined text-[20px]">menu_book</span>
                Artigos &amp; Análises
            </a>

            <div class="pt-4 mt-4 border-t border-border-dark">
                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    class="flex items-center gap-3 px-3 py-2.5 rounded text-sm font-medium text-secondary-fixed hover:text-surface-bright transition-colors"
                >
                    <span class="material-symbols-outlined text-[20px]">open_in_new</span>
                    Visualizar Site
                </a>
            </div>
        </nav>

        <!-- Rodapé do Usuário -->
        <div class="p-4 border-t border-border-dark flex items-center justify-between">
            <div class="flex flex-col truncate pr-2">
                <span class="text-xs font-semibold text-surface-bright truncate">{{ auth()->user()->name ?? 'Administrador' }}</span>
                <span class="text-[11px] text-text-muted truncate">{{ auth()->user()->email ?? '' }}</span>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="p-2 text-secondary-fixed-dim hover:text-surface-bright hover:bg-tertiary-container rounded transition-colors focus:outline-none"
                    title="Sair do painel"
                >
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Conteúdo Principal -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Topbar -->
        <header class="h-20 bg-surface-container-lowest border-b border-border-light px-8 flex items-center justify-between">
            <h1 class="font-headline-sm text-xl text-primary font-bold">
                {{ $header ?? 'Painel de Administração' }}
            </h1>
            <div class="flex items-center gap-4">
                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-surface-subtle hover:bg-surface-container-high text-primary font-body-sm text-xs font-medium rounded transition-colors"
                >
                    <span>Ir para o Site</span>
                    <span class="material-symbols-outlined text-[16px]">north_east</span>
                </a>
            </div>
        </header>

        <!-- Main Body -->
        <main class="flex-1 p-8 overflow-y-auto">
            <!-- Alertas de Feedback -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded shadow-sm flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-emerald-600">check_circle</span>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-800 rounded shadow-sm flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-red-600">error</span>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-900">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-800 rounded shadow-sm">
                    <p class="font-bold text-sm mb-1">Por favor, corrija os seguintes erros:</p>
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
</body>
</html>
