<x-admin.layouts.app>
    <x-slot:header>
        Cadastrar Novo Artigo
    </x-slot:header>

    <div class="max-w-4xl bg-surface-container-lowest p-6 border border-border-light shadow-sm">
        <form action="{{ route('admin.articles.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="category">Categoria *</label>
                    <input type="text" id="category" name="category" value="{{ old('category') }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary" placeholder="Ex: Direito Bancário, Direito do Trabalho, Previdenciário">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="tag">Tag / Destaque</label>
                    <input type="text" id="tag" name="tag" value="{{ old('tag') }}" class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary" placeholder="Ex: Financiamentos & Juros, Inovação Probatória">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="title">Título do Artigo *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="slug">Identificador URL (Slug)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary" placeholder="Deixe em branco para gerar automaticamente do título">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="order">Ordem de Exibição *</label>
                    <input type="number" id="order" name="order" value="{{ old('order', 1) }}" min="0" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">
                </div>

                <div class="md:col-span-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="active" value="1" {{ old('active', true) ? 'checked' : '' }} class="accent-primary">
                        <span class="text-xs font-semibold text-primary">Artigo Ativo e Publicado no Site</span>
                    </label>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="summary">Resumo do Artigo (Exibido nos Cards e Introdução) *</label>
                    <textarea id="summary" name="summary" rows="3" required class="w-full bg-surface-subtle p-2.5 text-sm border border-border-light focus:outline-none focus:border-secondary">{{ old('summary') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase text-primary mb-1" for="content">Conteúdo Completo do Artigo (Suporta Markdown e HTML)</label>
                    <textarea id="content" name="content" rows="12" class="w-full bg-surface-subtle p-2.5 text-sm font-mono border border-border-light focus:outline-none focus:border-secondary" placeholder="Digite o texto detalhado do artigo. Suporta títulos (##), listas, citações (>), etc.">{{ old('content') }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-border-light">
                <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 text-xs uppercase font-medium text-text-muted hover:text-primary">
                    Cancelar
                </a>
                <button
                    type="submit"
                    class="px-6 py-2.5 bg-primary-container text-on-primary text-xs uppercase font-semibold tracking-wider hover:bg-surface-tint transition-colors"
                >
                    Salvar Artigo
                </button>
            </div>
        </form>
    </div>
</x-admin.layouts.app>
