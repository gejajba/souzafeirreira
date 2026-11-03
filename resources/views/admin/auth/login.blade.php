<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Administrativo | Souza Pereira Advocacia</title>

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
<body class="bg-primary-container text-surface-bright min-h-screen flex items-center justify-center p-4 antialiased">
    <div class="max-w-md w-full bg-surface-container-lowest text-on-surface p-8 shadow-2xl border border-border-light relative">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-surface-subtle text-secondary mb-3">
                <span class="material-symbols-outlined text-[32px]">shield_person</span>
            </div>
            <h1 class="font-headline-sm text-2xl text-primary font-bold">Souza Pereira</h1>
            <p class="font-label-caps text-xs text-secondary uppercase tracking-[0.2em] mt-1">Painel Administrativo</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-800 text-xs">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 text-xs">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block font-caption text-xs uppercase font-semibold text-primary mb-1">
                    E-mail Institucional
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', 'admin@souzapereira.com') }}"
                    required
                    autofocus
                    class="w-full bg-surface-subtle p-3 text-sm border border-border-light focus:outline-none focus:border-secondary transition-colors"
                    placeholder="admin@souzapereira.com"
                >
            </div>

            <div>
                <label for="password" class="block font-caption text-xs uppercase font-semibold text-primary mb-1">
                    Senha de Acesso
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="w-full bg-surface-subtle p-3 text-sm border border-border-light focus:outline-none focus:border-secondary transition-colors"
                    placeholder="••••••••"
                >
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="accent-primary">
                    <span class="text-text-muted">Lembrar-me neste dispositivo</span>
                </label>
            </div>

            <button
                type="submit"
                class="w-full py-3 bg-primary-container text-on-primary font-body-sm text-sm font-semibold uppercase tracking-wider hover:bg-surface-tint transition-colors flex items-center justify-center gap-2"
            >
                <span>Acessar Painel</span>
                <span class="material-symbols-outlined text-[18px]">login</span>
            </button>
        </form>

        <div class="mt-8 pt-4 border-t border-border-light text-center">
            <a href="{{ route('home') }}" class="text-xs text-text-muted hover:text-primary transition-colors inline-flex items-center gap-1">
                <span class="material-symbols-outlined text-[14px]">arrow_back</span>
                Retornar ao Site
            </a>
        </div>
    </div>
</body>
</html>
