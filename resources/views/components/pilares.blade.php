@props(['pillars' => null])
@php
    $pillars = $pillars ?? \App\Models\Pillar::active()->ordered()->get();
@endphp

<!-- SEÇÃO 03: PILARES DE CONDUTA (FUNDO NOTURNO AZUL-MARINHO) -->
<section class="w-full bg-primary-container text-surface-bright py-space-3xl relative">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
        <div class="max-w-3xl mb-space-2xl">
            <span class="font-label-caps text-label-caps text-secondary-fixed tracking-[0.25em] uppercase block mb-space-xs">Nossos Fundamentos</span>
            <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-surface-bright leading-tight">
                A atenção a cada caso começa pela compreensão de cada situação.
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            @foreach($pillars as $pillar)
                <div class="bg-tertiary-container/50 p-space-xl flex flex-col justify-between h-full border border-border-dark">
                    <div>
                        <div class="flex items-center justify-between mb-space-lg">
                            <span class="font-label-index text-label-index text-secondary-fixed font-semibold">
                                {{ $pillar->number }}
                            </span>
                            <span class="material-symbols-outlined text-secondary-fixed text-[28px]">{{ $pillar->icon }}</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-surface-bright mb-space-md">
                            {{ $pillar->title }}
                        </h3>
                        <p class="font-body-md text-body-md text-on-primary-container leading-relaxed">
                            {{ $pillar->description }}
                        </p>
                    </div>
                    @if($pillar->tag)
                        <div class="mt-space-xl pt-space-md border-t border-border-dark">
                            <span class="font-caption text-caption text-secondary-fixed-dim uppercase tracking-wider">
                                {{ $pillar->tag }}
                            </span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
