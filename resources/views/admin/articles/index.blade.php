<x-admin.layouts.app>
    <x-slot:header>
        Artigos &amp; Análises Jurídicas
    </x-slot:header>

    <div class="bg-surface-container-lowest border border-border-light shadow-sm">
        <div class="p-6 flex items-center justify-between border-b border-border-light">
            <div>
                <h2 class="font-headline-sm text-lg text-primary font-bold">Publicações Institucionais</h2>
                <p class="text-xs text-text-muted">Artigos exibidos na seção de conteúdos informativos e na página de artigos.</p>
            </div>
            <a
                href="{{ route('admin.articles.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-primary-container text-on-primary text-xs uppercase font-semibold tracking-wider hover:bg-surface-tint transition-colors"
            >
                <span class="material-symbols-outlined text-[16px]">add</span>
                Novo Artigo
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-surface-subtle text-xs uppercase text-text-muted border-b border-border-light">
                    <tr>
                        <th class="py-3 px-4">Categoria</th>
                        <th class="py-3 px-4">Tag</th>
                        <th class="py-3 px-4">Título</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-light">
                    @forelse($articles as $article)
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="py-3 px-4 font-semibold text-xs text-secondary">
                                {{ $article->category }}
                            </td>
                            <td class="py-3 px-4 text-xs text-text-muted">
                                {{ $article->tag ?? '—' }}
                            </td>
                            <td class="py-3 px-4 font-semibold text-primary max-w-md truncate">
                                {{ $article->title }}
                            </td>
                            <td class="py-3 px-4">
                                @if($article->active)
                                    <span class="px-2 py-0.5 text-[11px] font-semibold bg-emerald-100 text-emerald-800 rounded">Ativo</span>
                                @else
                                    <span class="px-2 py-0.5 text-[11px] font-semibold bg-gray-100 text-gray-600 rounded">Inativo</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-3">
                                @if($article->active)
                                    <a
                                        href="{{ route('articles.show', $article) }}"
                                        target="_blank"
                                        class="text-xs text-text-muted hover:text-primary transition-colors inline-flex items-center gap-0.5"
                                        title="Visualizar no site"
                                    >
                                        <span>Ver</span>
                                        <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                                    </a>
                                @endif
                                <a href="{{ route('admin.articles.edit', $article) }}" class="text-xs text-secondary hover:underline">
                                    Editar
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline-block" onsubmit="return confirm('Deseja excluir este artigo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-red-600 hover:underline">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-text-muted text-xs">
                                Nenhum artigo cadastrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layouts.app>
