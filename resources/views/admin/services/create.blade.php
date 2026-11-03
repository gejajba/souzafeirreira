<x-admin.layouts.app>
    <x-slot:header>
        Cadastrar Novo Serviço
    </x-slot:header>

    <div class="max-w-4xl bg-surface-container-lowest p-6 border border-border-light shadow-sm">
        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="title">Título do Serviço *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="subtitle">Subtítulo / Especialidade</label>
                    <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary" placeholder="Ex: Defesa de Veículos & Patrimônio">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="slug">Identificador URL (Slug)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary" placeholder="Deixe em branco para gerar automaticamente">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="order">Ordem de Exibição *</label>
                    <input type="number" id="order" name="order" value="{{ old('order', 1) }}" min="0" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="short_description">Descrição Curta (Exibida no Card) *</label>
                    <textarea id="short_description" name="short_description" rows="3" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">{{ old('short_description') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="full_description">Descrição Detalhada (Exibida no Modal / Completo) *</label>
                    <textarea id="full_description" name="full_description" rows="5" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">{{ old('full_description') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="active" value="1" {{ old('active', true) ? 'checked' : '' }} class="accent-primary">
                        <span class="text-xs font-semibold text-primary">Serviço Ativo e Visível no Site</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-border-light">
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 text-xs uppercase font-medium text-text-muted hover:text-primary">
                    Cancelar
                </a>
                <button
                    type="submit"
                    class="px-6 py-2.5 bg-primary-container text-on-primary text-xs uppercase font-semibold tracking-wider hover:bg-surface-tint transition-colors"
                >
                    Salvar Serviço
                </button>
            </div>
        </form>
    </div>
</x-admin.layouts.app>
