<x-admin.layouts.app>
    <x-slot:header>
        Serviços &amp; Áreas de Atuação
    </x-slot:header>

    <div class="bg-surface-container-lowest border border-border-light shadow-sm">
        <div class="p-6 flex items-center justify-between border-b border-border-light">
            <div>
                <h2 class="font-headline-sm text-lg text-primary font-bold">Lista de Serviços</h2>
                <p class="text-xs text-text-muted">Serviços exibidos na seção "Nossos Serviços" do site.</p>
            </div>
            <a
                href="{{ route('admin.services.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-primary-container text-on-primary text-xs uppercase font-semibold tracking-wider hover:bg-surface-tint transition-colors"
            >
                <span class="material-symbols-outlined text-[16px]">add</span>
                Novo Serviço
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-surface-subtle text-xs uppercase text-text-muted border-b border-border-light">
                    <tr>
                        <th class="py-3 px-4 w-16">Ordem</th>
                        <th class="py-3 px-4">Título</th>
                        <th class="py-3 px-4">Subtítulo</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-light">
                    @forelse($services as $service)
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="py-3 px-4 font-mono font-bold text-secondary text-xs">
                                {{ sprintf('%02d', $service->order) }}
                            </td>
                            <td class="py-3 px-4 font-semibold text-primary">
                                {{ $service->title }}
                            </td>
                            <td class="py-3 px-4 text-xs text-text-muted">
                                {{ $service->subtitle ?? '—' }}
                            </td>
                            <td class="py-3 px-4">
                                @if($service->active)
                                    <span class="px-2 py-0.5 text-[11px] font-semibold bg-emerald-100 text-emerald-800 rounded">Ativo</span>
                                @else
                                    <span class="px-2 py-0.5 text-[11px] font-semibold bg-gray-100 text-gray-600 rounded">Inativo</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a
                                    href="{{ route('admin.services.edit', $service) }}"
                                    class="inline-flex items-center text-xs font-medium text-secondary hover:underline"
                                >
                                    Editar
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Deseja realmente remover este serviço?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-medium text-red-600 hover:underline">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-text-muted text-xs">
                                Nenhum serviço cadastrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layouts.app>
