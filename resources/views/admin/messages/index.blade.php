<x-admin.layouts.app>
    <x-slot:header>
        Mensagens de Contato Recebidas
    </x-slot:header>

    <div class="bg-surface-container-lowest border border-border-light shadow-sm">
        <div class="p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-border-light">
            <div>
                <h2 class="font-headline-sm text-lg text-primary font-bold">Mensagens do Formulário</h2>
                <p class="text-xs text-text-muted">Mensagens enviadas por clientes através do site.</p>
            </div>
            <div class="flex items-center gap-2">
                <a
                    href="{{ route('admin.messages.index') }}"
                    class="px-3 py-1.5 text-xs font-semibold rounded {{ !request()->has('unread') ? 'bg-primary-container text-on-primary' : 'bg-surface-subtle text-primary hover:bg-surface-container-high' }}"
                >
                    Todas
                </a>
                <a
                    href="{{ route('admin.messages.index', ['unread' => 1]) }}"
                    class="px-3 py-1.5 text-xs font-semibold rounded flex items-center gap-1.5 {{ request()->has('unread') ? 'bg-primary-container text-on-primary' : 'bg-surface-subtle text-primary hover:bg-surface-container-high' }}"
                >
                    <span>Não Lidas</span>
                    @if($unreadCount > 0)
                        <span class="px-1.5 py-0.2 bg-secondary text-on-secondary rounded-full text-[10px]">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-surface-subtle text-xs uppercase text-text-muted border-b border-border-light">
                    <tr>
                        <th class="py-3 px-4 w-10">Status</th>
                        <th class="py-3 px-4">Nome</th>
                        <th class="py-3 px-4">E-mail / Telefone</th>
                        <th class="py-3 px-4">Serviço</th>
                        <th class="py-3 px-4">Data</th>
                        <th class="py-3 px-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-light">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-surface-container-low transition-colors {{ !$msg->is_read ? 'bg-amber-50/50 font-medium' : '' }}">
                            <td class="py-3 px-4 text-center">
                                @if(!$msg->is_read)
                                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-amber-500" title="Não lida"></span>
                                @else
                                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-gray-300" title="Lida"></span>
                                @endif
                            </td>
                            <td class="py-3 px-4 font-semibold text-primary">
                                {{ $msg->name }}
                            </td>
                            <td class="py-3 px-4 text-xs">
                                <div>{{ $msg->email }}</div>
                                <div class="text-text-muted">{{ $msg->phone ?? '—' }}</div>
                            </td>
                            <td class="py-3 px-4 text-xs text-text-muted">
                                {{ $msg->service ?? 'Geral' }}
                            </td>
                            <td class="py-3 px-4 text-xs text-text-muted">
                                {{ $msg->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a
                                    href="{{ route('admin.messages.show', $msg) }}"
                                    class="inline-flex items-center text-xs font-semibold text-secondary hover:underline"
                                >
                                    Visualizar
                                </a>
                                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="inline-block" onsubmit="return confirm('Deseja excluir esta mensagem?')">
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
                            <td colspan="6" class="py-12 text-center text-text-muted text-xs">
                                Nenhuma mensagem encontrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div class="p-4 border-t border-border-light">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</x-admin.layouts.app>
