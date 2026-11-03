<x-admin.layouts.app>
    <x-slot:header>
        Pilares de Conduta
    </x-slot:header>

    <div class="bg-surface-container-lowest border border-border-light shadow-sm">
        <div class="p-6 flex items-center justify-between border-b border-border-light">
            <div>
                <h2 class="font-headline-sm text-lg text-primary font-bold">Pilares Fundamentais</h2>
                <p class="text-xs text-text-muted">Princípios exibidos no bloco noturno da página institucional.</p>
            </div>
            <a
                href="{{ route('admin.pillars.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-primary-container text-on-primary text-xs uppercase font-semibold tracking-wider hover:bg-surface-tint transition-colors"
            >
                <span class="material-symbols-outlined text-[16px]">add</span>
                Novo Pilar
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-surface-subtle text-xs uppercase text-text-muted border-b border-border-light">
                    <tr>
                        <th class="py-3 px-4 w-24">Identificador</th>
                        <th class="py-3 px-4">Título</th>
                        <th class="py-3 px-4">Tag</th>
                        <th class="py-3 px-4">Ícone</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-light">
                    @forelse($pillars as $pillar)
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="py-3 px-4 font-mono font-bold text-secondary text-xs">
                                {{ $pillar->number }}
                            </td>
                            <td class="py-3 px-4 font-semibold text-primary">
                                {{ $pillar->title }}
                            </td>
                            <td class="py-3 px-4 text-xs text-text-muted">
                                {{ $pillar->tag ?? '—' }}
                            </td>
                            <td class="py-3 px-4 text-xs font-mono">
                                <span class="material-symbols-outlined text-[18px] text-secondary">{{ $pillar->icon }}</span>
                            </td>
                            <td class="py-3 px-4">
                                @if($pillar->active)
                                    <span class="px-2 py-0.5 text-[11px] font-semibold bg-emerald-100 text-emerald-800 rounded">Ativo</span>
                                @else
                                    <span class="px-2 py-0.5 text-[11px] font-semibold bg-gray-100 text-gray-600 rounded">Inativo</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('admin.pillars.edit', $pillar) }}" class="text-xs text-secondary hover:underline">
                                    Editar
                                </a>
                                <form action="{{ route('admin.pillars.destroy', $pillar) }}" method="POST" class="inline-block" onsubmit="return confirm('Deseja excluir este pilar?')">
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
                            <td colspan="6" class="py-8 text-center text-text-muted text-xs">
                                Nenhum pilar cadastrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layouts.app>
