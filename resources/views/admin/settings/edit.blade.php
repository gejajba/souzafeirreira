<x-admin.layouts.app>
    <x-slot:header>
        Configurações Gerais &amp; Textos Institucionais
    </x-slot:header>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8 max-w-5xl">
        @csrf
        @method('PUT')

        <!-- Bloco 1: Identidade do Site -->
        <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm">
            <h2 class="font-headline-sm text-lg text-primary font-bold mb-4 pb-2 border-b border-border-light flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary">badge</span>
                Identidade do Escritório
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="site_title">Nome do Escritório</label>
                    <input type="text" id="site_title" name="site_title" value="{{ old('site_title', $settings->site_title) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="site_subtitle">Slogan / Subtítulo</label>
                    <input type="text" id="site_subtitle" name="site_subtitle" value="{{ old('site_subtitle', $settings->site_subtitle) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="meta_description">Descrição SEO (Meta Description)</label>
                    <textarea id="meta_description" name="meta_description" rows="2" class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">{{ old('meta_description', $settings->meta_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Bloco 2: Seção Hero (Apresentação Inicial) -->
        <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm">
            <h2 class="font-headline-sm text-lg text-primary font-bold mb-4 pb-2 border-b border-border-light flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary">flare</span>
                Seção de Abertura (Hero)
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="location_badge">Badge de Localização</label>
                    <input type="text" id="location_badge" name="location_badge" value="{{ old('location_badge', $settings->location_badge) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="hero_title">Título Principal (Hero)</label>
                    <input type="text" id="hero_title" name="hero_title" value="{{ old('hero_title', $settings->hero_title) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="hero_subtitle">Texto de Apoio (Hero)</label>
                    <textarea id="hero_subtitle" name="hero_subtitle" rows="3" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">{{ old('hero_subtitle', $settings->hero_subtitle) }}</textarea>
                </div>

                <!-- Métricas -->
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="metric_1_number">Métrica 1 (Valor)</label>
                    <input type="text" id="metric_1_number" name="metric_1_number" value="{{ old('metric_1_number', $settings->metric_1_number) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="metric_1_label">Métrica 1 (Rótulo)</label>
                    <input type="text" id="metric_1_label" name="metric_1_label" value="{{ old('metric_1_label', $settings->metric_1_label) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="metric_2_number">Métrica 2 (Valor)</label>
                    <input type="text" id="metric_2_number" name="metric_2_number" value="{{ old('metric_2_number', $settings->metric_2_number) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="metric_2_label">Métrica 2 (Rótulo)</label>
                    <input type="text" id="metric_2_label" name="metric_2_label" value="{{ old('metric_2_label', $settings->metric_2_label) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="metric_3_number">Métrica 3 (Valor)</label>
                    <input type="text" id="metric_3_number" name="metric_3_number" value="{{ old('metric_3_number', $settings->metric_3_number) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="metric_3_label">Métrica 3 (Rótulo)</label>
                    <input type="text" id="metric_3_label" name="metric_3_label" value="{{ old('metric_3_label', $settings->metric_3_label) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
            </div>
        </div>

        <!-- Bloco 3: Seção Sobre Nós / Fundador -->
        <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm">
            <h2 class="font-headline-sm text-lg text-primary font-bold mb-4 pb-2 border-b border-border-light flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary">person</span>
                Sobre Nós &amp; Advogado Fundador
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="about_founder_name">Nome do Fundador</label>
                    <input type="text" id="about_founder_name" name="about_founder_name" value="{{ old('about_founder_name', $settings->about_founder_name) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="about_founder_title">Cargo / Título</label>
                    <input type="text" id="about_founder_title" name="about_founder_title" value="{{ old('about_founder_title', $settings->about_founder_title) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="about_founder_oab">Selo OAB / Registro</label>
                    <input type="text" id="about_founder_oab" name="about_founder_oab" value="{{ old('about_founder_oab', $settings->about_founder_oab) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="about_text_1">Texto Institucional 1 (Histórico &amp; Fundação)</label>
                    <textarea id="about_text_1" name="about_text_1" rows="3" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">{{ old('about_text_1', $settings->about_text_1) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="about_text_2">Texto Institucional 2 (Atendimento Personalizado)</label>
                    <textarea id="about_text_2" name="about_text_2" rows="3" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">{{ old('about_text_2', $settings->about_text_2) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="about_quote">Citação / Manifesto</label>
                    <input type="text" id="about_quote" name="about_quote" value="{{ old('about_quote', $settings->about_quote) }}" class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="about_quote_author">Autor da Citação</label>
                    <input type="text" id="about_quote_author" name="about_quote_author" value="{{ old('about_quote_author', $settings->about_quote_author) }}" class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
            </div>
        </div>

        <!-- Bloco 4: Contato & Sede -->
        <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm">
            <h2 class="font-headline-sm text-lg text-primary font-bold mb-4 pb-2 border-b border-border-light flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary">contact_phone</span>
                Canais de Contato &amp; Localização
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="phone">Telefone / WhatsApp (Exibição)</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $settings->phone) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="email">E-mail de Contato</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $settings->email) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="whatsapp_url">Link Direto do WhatsApp</label>
                    <input type="url" id="whatsapp_url" name="whatsapp_url" value="{{ old('whatsapp_url', $settings->whatsapp_url) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="address">Endereço Completo da Sede</label>
                    <input type="text" id="address" name="address" value="{{ old('address', $settings->address) }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light">
                </div>
            </div>
        </div>

        <!-- Botão Salvar -->
        <div class="flex items-center justify-end gap-4">
            <button
                type="submit"
                class="px-8 py-3 bg-primary-container text-on-primary font-body-sm text-sm font-semibold uppercase tracking-wider hover:bg-surface-tint transition-colors flex items-center gap-2"
            >
                <span class="material-symbols-outlined text-[18px]">save</span>
                Salvar Alterações
            </button>
        </div>
    </form>
</x-admin.layouts.app>
