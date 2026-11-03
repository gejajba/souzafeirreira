@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'canonical' => null,
    'ogType' => 'website',
    'ogImage' => null,
    'settings' => null,
])
@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
    $defaultTitle = $settings->site_title . ' | ' . $settings->site_subtitle;
    
    if ($title) {
        $finalTitle = str_contains($title, $settings->site_title) ? $title : ($title . ' | ' . $settings->site_title);
    } else {
        $finalTitle = $defaultTitle;
    }

    $finalDescription = $description ?? $settings->meta_description ?? 'Souza Pereira Advocacia — Escritório em Gravataí/RS especializado em Direito Bancário (busca e apreensão, revisional), Previdenciário, Trabalhista e Cível.';
    $finalCanonical = $canonical ?? url()->current();
    $finalImage = $ogImage ?? $settings->hero_image_url ?? asset('img/banner-novo.png');
    $defaultKeywords = 'advogado gravataí, advocacia gravataí, souza pereira advocacia, direito bancário, busca e apreensão gravataí, ação revisional financiamento, direito do trabalho gravataí, aposentadoria inss gravataí, marcelo luiz souza pereira';
    $finalKeywords = $keywords ?? $defaultKeywords;

    $legalServiceSchema = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'LegalService',
        '@id' => route('home') . '#organization',
        'name' => $settings->site_title,
        'alternateName' => 'Souza Pereira Advocacia & Consultoria Jurídica',
        'description' => $finalDescription,
        'url' => route('home'),
        'logo' => asset('img/logo.jpeg'),
        'image' => $finalImage,
        'telephone' => $settings->phone,
        'email' => $settings->email,
        'priceRange' => '$$',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Rua Ary Tubbs, 569 - Sala 303, Centro',
            'addressLocality' => 'Gravataí',
            'addressRegion' => 'RS',
            'postalCode' => '94010-180',
            'addressCountry' => 'BR',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => -29.9439,
            'longitude' => -50.9926,
        ],
        'founder' => [
            '@type' => 'Person',
            'name' => $settings->about_founder_name,
            'jobTitle' => $settings->about_founder_title,
            'image' => $settings->about_founder_image_url,
        ],
        'openingHoursSpecification' => [
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens' => '09:00',
                'closes' => '18:00',
            ],
        ],
        'areaServed' => [
            ['@type' => 'City', 'name' => 'Gravataí'],
            ['@type' => 'AdministrativeArea', 'name' => 'Rio Grande do Sul'],
            ['@type' => 'Country', 'name' => 'Brasil'],
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Áreas de Atuação Jurídica',
            'itemListElement' => [
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Direito Bancário - Busca e Apreensão e Ações Revisionais']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Direito do Trabalho']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Direito Previdenciário e Planejamento de Aposentadoria']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Direito Civil, Imobiliário e Família']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Direito Penal Estratégico']],
            ],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
@endphp
<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Metatags Principais de SEO -->
    <title>{{ $finalTitle }}</title>
    <meta name="description" content="{{ $finalDescription }}">
    <meta name="keywords" content="{{ $finalKeywords }}">
    <meta name="author" content="Marcelo Luiz S. Pereira - Souza Pereira Advocacia">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ $finalCanonical }}">

    <!-- SEO Local & Geolocalização (Gravataí / RS) -->
    <meta name="geo.region" content="BR-RS">
    <meta name="geo.placename" content="Gravataí">
    <meta name="geo.position" content="-29.9439;-50.9926">
    <meta name="ICBM" content="-29.9439, -50.9926">

    <!-- Open Graph / Redes Sociais (WhatsApp, Facebook, LinkedIn) -->
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:site_name" content="{{ $settings->site_title }}">
    <meta property="og:title" content="{{ $finalTitle }}">
    <meta property="og:description" content="{{ $finalDescription }}">
    <meta property="og:url" content="{{ $finalCanonical }}">
    <meta property="og:image" content="{{ $finalImage }}">
    <meta property="og:image:alt" content="{{ $settings->site_title }}">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $finalTitle }}">
    <meta name="twitter:description" content="{{ $finalDescription }}">
    <meta name="twitter:image" content="{{ $finalImage }}">

    <!-- Favicon Oficial Souza Pereira Advocacia -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Preconnect & Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Dados Estruturados Schema.org (JSON-LD) para Escritório de Advocacia -->
    <script type="application/ld+json">
    {!! $legalServiceSchema !!}
    </script>

    @isset($schema)
        {{ $schema }}
    @endisset
</head>
<body class="bg-surface font-body-md text-body-md text-on-surface antialiased selection:bg-secondary-container selection:text-on-secondary-fixed">
    {{ $slot }}

    @stack('scripts')
</body>
</html>
