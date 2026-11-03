@props(['settings' => null])
@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
@endphp

<!-- Botão Flutuante do WhatsApp Oficial -->
<aside aria-label="Canal WhatsApp" class="fixed bottom-6 right-6 z-50">
    <a
        href="{{ $settings->whatsapp_url }}"
        target="_blank"
        rel="noopener noreferrer"
        class="group relative flex items-center justify-center w-14 h-14 bg-[#25D366] text-white rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 focus:outline-none"
        aria-label="Fale conosco pelo WhatsApp"
    >
        <!-- Ondas de pulso -->
        <span class="absolute inset-0 rounded-full bg-[#25D366] opacity-30 animate-ping group-hover:opacity-40"></span>

        <!-- Ícone WhatsApp SVG oficial -->
        <svg class="relative w-8 h-8 fill-current" viewBox="0 0 24 24">
            <path d="M12.031 2C6.511 2 2.022 6.488 2.022 12.008c0 1.761.46 3.48 1.332 4.992L2 22l5.131-1.325a9.986 9.986 0 0 0 4.9 1.282h.004c5.518 0 10.007-4.489 10.007-10.009 0-2.673-1.041-5.186-2.932-7.078A9.932 9.932 0 0 0 12.031 2zm0 18.272a8.28 8.28 0 0 1-4.223-1.152l-.303-.18-3.042.785.811-2.964-.197-.313a8.293 8.293 0 0 1-1.272-4.44c0-4.577 3.724-8.301 8.306-8.301 2.217 0 4.302.864 5.87 2.433a8.243 8.243 0 0 1 2.431 5.87c0 4.578-3.724 8.302-8.306 8.302zm4.553-6.22c-.25-.125-1.478-.729-1.708-.812-.229-.083-.396-.125-.562.125-.167.25-.646.812-.792.979-.146.167-.292.188-.542.063s-1.056-.39-2.012-1.242c-.744-.663-1.247-1.482-1.393-1.732-.146-.25-.016-.385.109-.51.113-.112.25-.292.375-.438.125-.146.167-.25.25-.417.083-.167.042-.313-.021-.438s-.563-1.354-.771-1.854c-.203-.487-.41-.421-.563-.429-.146-.008-.313-.01-.479-.01s-.438.063-.667.313c-.229.25-.875.854-.875 2.083s.896 2.417 1.021 2.583c.125.167 1.764 2.694 4.274 3.777.597.258 1.064.412 1.428.528.6.191 1.146.164 1.578.1.481-.072 1.478-.604 1.687-1.188.208-.583.208-1.083.146-1.188-.063-.104-.229-.167-.479-.292z"/>
        </svg>

        <!-- Tooltip flutuante -->
        <span class="absolute right-full mr-3 whitespace-nowrap bg-primary-container text-surface-bright text-xs px-3 py-1.5 rounded shadow-lg opacity-0 pointer-events-none group-hover:opacity-100 transition-opacity duration-300">
            Fale conosco no WhatsApp
        </span>
    </a>
</aside>
