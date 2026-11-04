@props(['settings'])
<section class="w-full bg-surface-subtle py-space-3xl" id="sobre">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
        <div class="flex flex-col mb-space-2xl">
            <span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.25em] mb-space-xs">01 — SOBRE NÓS</span>
            <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary max-w-3xl leading-tight">Advocacia de excelência fundada em relações de confiança e proximidade.</h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
            <div class="lg:col-span-5"><div class="relative aspect-[4/5] overflow-hidden bg-primary-container"><img class="w-full h-full object-cover object-top" src="{{ $settings->about_founder_image_url }}" alt="{{ $settings->about_founder_name }}"><div class="absolute bottom-0 inset-x-0 p-space-md bg-gradient-to-t from-primary-container/90 to-transparent"><span class="font-headline-sm text-headline-sm text-surface-bright block">{{ $settings->about_founder_name }}</span><span class="font-caption text-caption text-secondary-fixed uppercase">{{ $settings->about_founder_title }}</span></div></div><div class="bg-surface-container-lowest p-space-md border border-border-light"><span class="font-body-sm text-body-sm text-on-surface font-medium">{{ $settings->about_founder_oab }}</span></div></div>
            <div class="lg:col-span-7 flex flex-col gap-space-lg"><div class="bg-surface-container-lowest p-space-xl border border-border-light"><span class="font-label-caps text-label-caps text-secondary uppercase">Nossa Trajetória</span><p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mt-space-md">{{ $settings->about_text_1 }}</p><p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mt-space-md">{{ $settings->about_text_2 }}</p></div>@if($settings->about_quote)<blockquote class="bg-surface-container-lowest p-space-xl border-l-2 border-secondary font-editorial-quote text-editorial-quote text-primary italic">{{ $settings->about_quote }}<cite class="block font-body-sm text-body-sm text-text-muted mt-space-md not-italic">{{ $settings->about_quote_author }}</cite></blockquote>@endif</div>
        </div>
    </div>
</section>
