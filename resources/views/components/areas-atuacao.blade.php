@props(['services' => null, 'settings' => null])
@php
    $services = $services ?? \App\Models\Service::active()->ordered()->get();
    $settings = $settings ?? \App\Models\SiteSetting::current();
@endphp

<!-- SEÇÃO 02: SERVIÇOS / ÁREAS DE ATUAÇÃO -->
<section class="w-full bg-surface py-space-3xl" id="servicos">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
        <!-- Section Title Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter mb-space-2xl">
            <div class="lg:col-span-5">
                <span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.25em] mb-space-xs block">02 — PRÁTICA JURÍDICA</span>
                <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary leading-tight">
                    Nossos Serviços
                </h2>
            </div>
            <div class="lg:col-span-7 flex items-end">
                <p class="font-body-md text-body-md text-on-surface-variant max-w-xl">
                    Nosso diferencial reside na proximidade e na confiança que cultivamos com nossos clientes. Oferecemos consultas online e atendimento presencial. Confira nossos serviços especializados.
                </p>
            </div>
        </div>

        <!-- Lista de Linhas Horizontais Numeradas com Abertura de Detalhes -->
        <div class="flex flex-col gap-space-sm">
            @foreach($services as $index => $service)
                <div
                    class="service-card group bg-surface-container-low hover:bg-surface-subtle transition-all duration-300 p-space-lg lg:p-space-xl shadow-sm border border-border-light cursor-pointer"
                    data-service-modal="modal-{{ $service->slug }}"
                >
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-space-md items-center">
                        <div class="md:col-span-1">
                            <span class="font-headline-md text-headline-md text-secondary group-hover:text-primary transition-colors">
                                {{ sprintf('%02d', $service->order ?: $index + 1) }}
                            </span>
                        </div>
                        <div class="md:col-span-4">
                            <h3 class="font-headline-sm text-headline-sm text-primary">{{ $service->title }}</h3>
                            @if($service->subtitle)
                                <span class="font-caption text-caption text-text-muted uppercase tracking-wider block mt-1">
                                    {{ $service->subtitle }}
                                </span>
                            @endif
                        </div>
                        <div class="md:col-span-6">
                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                                {{ $service->short_description }}
                            </p>
                        </div>
                        <div class="md:col-span-1 flex justify-start md:justify-end">
                            <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center group-hover:bg-primary-container group-hover:text-on-primary transition-all duration-300">
                                <span class="material-symbols-outlined text-[20px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modais com Texto Integral de Cada Serviço -->
    @foreach($services as $service)
        <div id="modal-{{ $service->slug }}" class="service-modal fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-surface-container-lowest max-w-2xl w-full p-space-xl shadow-2xl border border-border-light relative animate-in fade-in">
                <button type="button" class="close-modal absolute top-4 right-4 text-on-surface-variant hover:text-primary p-2 focus:outline-none" aria-label="Fechar modal">
                    <span class="material-symbols-outlined text-[24px]">close</span>
                </button>
                <div class="inline-flex items-center gap-space-xs text-secondary mb-space-xs">
                    <span class="font-label-caps text-label-caps uppercase tracking-widest">Serviço Especializado</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-primary mb-space-md">{{ $service->title }}</h3>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-space-lg">
                    {{ $service->full_description }}
                </p>
                <div class="pt-space-md border-t border-border-light flex flex-wrap gap-space-md justify-between items-center">
                    <a
                        href="https://api.whatsapp.com/send/?phone=5551999201927&text={{ urlencode('Olá, gostaria de orientação sobre ' . $service->title) }}&type=phone_number&app_absent=0"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-space-md py-space-sm bg-primary-container text-on-primary font-body-sm text-body-sm uppercase tracking-wider hover:bg-surface-tint transition-colors"
                    >
                        <span>Falar no WhatsApp</span>
                        <span class="material-symbols-outlined text-[18px]">chat</span>
                    </a>
                    <button type="button" class="close-modal text-body-sm text-on-surface-variant hover:text-primary transition-colors">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</section>
