@props(['settings' => null, 'services' => null])
@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
    $services = $services ?? \App\Models\Service::active()->ordered()->get();
@endphp

<!-- SEÇÃO 05: CONTATO, LOCALIZAÇÃO & AGENDAMENTO -->
<section class="w-full bg-primary-container text-surface-bright py-space-3xl" id="contato">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            <!-- Coluna Esquerda: Informações Oficiais e Botão de Atendimento -->
            <div class="lg:col-span-5 flex flex-col justify-between">
                <div>
                    <span class="font-label-caps text-label-caps text-secondary-fixed uppercase tracking-[0.25em] mb-space-xs block">Canal de Atendimento</span>
                    <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-surface-bright mb-space-md leading-tight">
                        Estamos à disposição para conversar.
                    </h2>
                    <p class="font-body-md text-body-md text-on-primary-container leading-relaxed mb-space-xl">
                        Agende uma consulta presencial ou remota com a equipe do {{ $settings->site_title }}. Atendimento direto e individualizado sob sigilo profissional.
                    </p>

                    <!-- Card WhatsApp Oficial -->
                    <a
                        class="group bg-surface-bright text-primary p-space-lg flex items-center justify-between shadow-lg hover:bg-secondary-container transition-colors mb-space-xl block"
                        href="{{ $settings->whatsapp_url }}"
                        rel="noopener noreferrer"
                        target="_blank"
                    >
                        <div class="flex items-center gap-space-md">
                            <div class="w-12 h-12 rounded-full bg-[#25D366] text-white flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-[24px]">chat</span>
                            </div>
                            <div>
                                <span class="font-caption text-caption text-secondary uppercase font-semibold tracking-wider block">Canal WhatsApp Oficial</span>
                                <span class="font-headline-sm text-headline-sm text-primary font-bold">{{ $settings->phone }}</span>
                            </div>
                        </div>
                        <span class="material-symbols-outlined text-[24px] text-primary transition-transform group-hover:translate-x-1">north_east</span>
                    </a>

                    <!-- Endereço Institucional em Gravataí -->
                    <div class="bg-tertiary-container/60 p-space-lg mb-space-xl border border-border-dark">
                        <div class="flex items-start gap-space-md">
                            <span class="material-symbols-outlined text-secondary-fixed text-[24px] mt-1 shrink-0">pin_drop</span>
                            <div>
                                <span class="font-label-caps text-label-caps text-secondary-fixed uppercase tracking-wider block mb-1">Sede em Gravataí / RS</span>
                                <p class="font-body-sm text-body-sm text-surface-bright leading-relaxed">
                                    {{ $settings->address }}
                                </p>
                                <span class="font-caption text-caption text-on-primary-container block mt-2">
                                    Atendimento presencial mediante agendamento prévio e consultas online.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mapa Visual de Localização em Gravataí -->
                <div
                    class="w-full h-44 bg-cover bg-center shadow-inner relative border border-border-dark"
                    data-location="{{ $settings->address }}"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB8DeShQTzFIPQzXG1CGrroc9PmJeBS63UC_oDt3i3UlCxPEYBcFfFppETPhAxFH818nKImiAnV_zVTkxt7uCqiBuPz-oT9L0yDJ6RzHjn_aNv6_8Ljw4vSoF3OOBpixCOAJvzlsIGitun0mOh_IZNpqcVlAl2wSxL7DTkWQJZxoVbV-fEKzOtqT4i1jee_7n0ae2zei3vV4AFfpujPu-JWU2VuOGsGbx9hBN5nfGp5')"
                >
                    <div class="absolute inset-0 bg-primary/40 flex items-center justify-center">
                        <div class="bg-surface px-space-md py-space-xs text-primary font-body-sm text-body-sm font-semibold flex items-center gap-space-xs shadow-md">
                            <span class="material-symbols-outlined text-secondary text-[18px]">location_on</span>
                            Centro de Gravataí / RS
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coluna Direita: Formulário de Contato -->
            <div class="lg:col-span-7 bg-surface p-space-xl lg:p-space-2xl text-on-surface shadow-2xl border border-border-light">
                <div class="mb-space-lg">
                    <span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.2em] block mb-1">Contato</span>
                    <h3 class="font-headline-md text-headline-md text-primary leading-snug">Envie sua mensagem</h3>
                    <p class="font-body-sm text-body-sm text-text-muted mt-1">
                        Preencha o formulário abaixo e entraremos em contato com você o mais breve possível.
                    </p>
                </div>

                <!-- Mensagem de Confirmação -->
                <div id="contact-success-msg" class="hidden mb-space-md p-space-md bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 font-body-sm">
                    Sua mensagem foi enviada com sucesso ao Souza Pereira Advocacia. Entraremos em contato em breve!
                </div>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-space-md" id="contact-form">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                        <div class="flex flex-col">
                            <label class="font-caption text-caption text-primary uppercase font-semibold mb-1" for="nome">Seu nome *</label>
                            <input
                                class="w-full bg-surface-subtle p-space-sm font-body-sm text-body-sm text-on-surface border border-transparent focus:outline-none focus:border-secondary focus:bg-surface-container-highest transition-colors"
                                id="nome"
                                name="nome"
                                placeholder="Digite seu nome completo"
                                required
                                type="text"
                            >
                        </div>
                        <div class="flex flex-col">
                            <label class="font-caption text-caption text-primary uppercase font-semibold mb-1" for="email">Email *</label>
                            <input
                                class="w-full bg-surface-subtle p-space-sm font-body-sm text-body-sm text-on-surface border border-transparent focus:outline-none focus:border-secondary focus:bg-surface-container-highest transition-colors"
                                id="email"
                                name="email"
                                placeholder="seu@email.com"
                                required
                                type="email"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                        <div class="flex flex-col">
                            <label class="font-caption text-caption text-primary uppercase font-semibold mb-1" for="telefone">Telefone / WhatsApp</label>
                            <input
                                class="w-full bg-surface-subtle p-space-sm font-body-sm text-body-sm text-on-surface border border-transparent focus:outline-none focus:border-secondary focus:bg-surface-container-highest transition-colors"
                                id="telefone"
                                name="telefone"
                                placeholder="(51) 99999-9999"
                                type="tel"
                            >
                        </div>
                        <div class="flex flex-col">
                            <label class="font-caption text-caption text-primary uppercase font-semibold mb-1" for="area">Serviço de Interesse</label>
                            <select
                                class="w-full bg-surface-subtle p-space-sm font-body-sm text-body-sm text-on-surface border border-transparent focus:outline-none focus:border-secondary focus:bg-surface-container-highest transition-colors cursor-pointer"
                                id="area"
                                name="area"
                            >
                                @foreach($services as $svc)
                                    <option value="{{ $svc->title }}">{{ $svc->title }}</option>
                                @endforeach
                                <option value="Outro assunto">Outro assunto</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="font-caption text-caption text-primary uppercase font-semibold mb-1" for="mensagem">Mensagem *</label>
                        <textarea
                            class="w-full bg-surface-subtle p-space-sm font-body-sm text-body-sm text-on-surface border border-transparent focus:outline-none focus:border-secondary focus:bg-surface-container-highest transition-colors resize-none"
                            id="mensagem"
                            name="mensagem"
                            placeholder="Descreva brevemente a sua dúvida ou situação..."
                            required
                            rows="4"
                        ></textarea>
                    </div>

                    <div class="flex items-start gap-space-sm pt-space-xs">
                        <input class="mt-1 h-4 w-4 rounded-none accent-primary cursor-pointer" id="lgpd" required type="checkbox">
                        <label class="font-caption text-caption text-text-muted leading-tight cursor-pointer" for="lgpd">
                            Concordo com o envio dos dados estritamente para fins de retorno e atendimento jurídico, em conformidade com a <a href="{{ route('lgpd') }}" target="_blank" class="text-primary hover:underline font-medium">Política de Privacidade (LGPD)</a>.
                        </label>
                    </div>

                    <div class="pt-space-sm">
                        <button
                            class="w-full py-space-md bg-primary-container text-on-primary font-body-sm text-body-sm font-semibold uppercase tracking-wider hover:bg-surface-tint transition-colors flex items-center justify-center gap-space-xs cursor-pointer focus:outline-none"
                            type="submit"
                        >
                            <span>Enviar Mensagem</span>
                            <span class="material-symbols-outlined text-[18px]">send</span>
                        </button>
                    </div>
                </form>

                <div class="mt-space-lg pt-space-md border-t border-border-light flex items-center justify-between font-caption text-caption text-text-muted">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-secondary">lock</span>
                        Comunicação Segura &amp; Sigilosa
                    </span>
                    <span>OAB/RS • Atendimento Direto</span>
                </div>
            </div>
        </div>
    </div>
</section>
