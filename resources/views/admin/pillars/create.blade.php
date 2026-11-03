<x-admin.layouts.app>
    <x-slot:header>
        Cadastrar Novo Pilar
    </x-slot:header>

    <div class="max-w-3xl bg-surface-container-lowest p-6 border border-border-light shadow-sm">
        <form action="{{ route('admin.pillars.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="number">Número / Identificador *</label>
                    <input type="text" id="number" name="number" value="{{ old('number', 'PILAR IV') }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="title">Título do Pilar *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="tag">Tag Inferior</label>
                    <input type="text" id="tag" name="tag" value="{{ old('tag') }}" class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary" placeholder="Ex: Acompanhamento Direto">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="icon">Nome do Ícone (Material Symbols) *</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon', 'balance') }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary" placeholder="Ex: balance, visibility, support_agent">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="order">Ordem *</label>
                    <input type="number" id="order" name="order" value="{{ old('order', 1) }}" min="0" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>

                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="active" value="1" {{ old('active', true) ? 'checked' : '' }} class="accent-primary">
                        <span class="text-xs font-semibold text-primary">Pilar Ativo no Site</span>
                    </label>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="description">Descrição do Pilar *</label>
                    <textarea id="description" name="description" rows="4" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-border-light">
                <a href="{{ route('admin.pillars.index') }}" class="px-4 py-2 text-xs uppercase font-medium text-text-muted hover:text-primary">
                    Cancelar
                </a>
                <button
                    type="submit"
                    class="px-6 py-2.5 bg-primary-container text-on-primary text-xs uppercase font-semibold tracking-wider hover:bg-surface-tint transition-colors"
                >
                    Salvar Pilar
                </button>
            </div>
        </form>
    </div>
</x-admin.layouts.app>
