<x-admin.layouts.app>
    <x-slot:header>
        Mensagem de {{ $message->name }}
    </x-slot:header>

    <div class="max-w-4xl bg-surface-container-lowest p-8 border border-border-light shadow-sm space-y-6">
        <div class="flex items-center justify-between pb-4 border-b border-border-light">
            <div>
                <span class="text-xs uppercase tracking-wider text-text-muted">Mensagem Recebida</span>
                <h2 class="font-headline-sm text-xl text-primary font-bold">{{ $message->name }}</h2>
                <div class="text-xs text-text-muted mt-1">
                    Enviada em {{ $message->created_at->format('d/m/Y \à\s H:i') }} ({{ $message->created_at->diffForHumans() }})
                </div>
            </div>
            <div class="flex items-center gap-2">
                <form action="{{ route('admin.messages.toggle-read', $message) }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="px-3 py-1.5 text-xs font-semibold rounded border border-border-light hover:bg-surface-subtle transition-colors"
                    >
                        {{ $message->is_read ? 'Marcar como Não Lida' : 'Marcar como Lida' }}
                    </button>
                </form>
                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir esta mensagem?')">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="px-3 py-1.5 text-xs font-semibold text-red-600 rounded border border-red-200 hover:bg-red-50 transition-colors"
                    >
                        Excluir
                    </button>
                </form>
            </div>
        </div>

        <!-- Detalhes do Contato -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 bg-surface-subtle text-xs border border-border-light">
            <div>
                <strong class="text-primary block mb-0.5">E-mail:</strong>
                <a href="mailto:{{ $message->email }}" class="text-secondary hover:underline">
                    {{ $message->email }}
                </a>
            </div>
            <div>
                <strong class="text-primary block mb-0.5">Telefone / WhatsApp:</strong>
                @if($message->phone)
                    @php
                        $cleanPhone = preg_replace('/\D/', '', $message->phone);
                    @endphp
                    <a
                        href="https://api.whatsapp.com/send/?phone=55{{ $cleanPhone }}&text=Olá%20{{ urlencode($message->name) }},%20recebemos%20sua%20mensagem%20no%20escritório%20Souza%20Pereira%20Advocacia."
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-emerald-700 hover:underline font-semibold flex items-center gap-1"
                    >
                        <span>{{ $message->phone }}</span>
                        <span class="material-symbols-outlined text-[14px]">chat</span>
                    </a>
                @else
                    <span class="text-text-muted">Não informado</span>
                @endif
            </div>
            <div>
                <strong class="text-primary block mb-0.5">Área de Interesse:</strong>
                <span class="text-on-surface">{{ $message->service ?? 'Geral' }}</span>
            </div>
        </div>

        <!-- Conteúdo da Mensagem -->
        <div>
            <h3 class="text-xs uppercase font-bold text-primary mb-2">Mensagem do Cliente:</h3>
            <div class="p-5 bg-surface-container-low border border-border-light text-sm text-on-surface leading-relaxed whitespace-pre-line font-sans">
                {{ $message->message }}
            </div>
        </div>

        <!-- Ações de Retorno -->
        <div class="pt-4 border-t border-border-light flex items-center justify-between">
            <a href="{{ route('admin.messages.index') }}" class="text-xs text-text-muted hover:text-primary transition-colors flex items-center gap-1">
                <span class="material-symbols-outlined text-[14px]">arrow_back</span>
                Voltar para a lista de mensagens
            </a>

            @if($message->phone)
                <a
                    href="https://api.whatsapp.com/send/?phone=55{{ $cleanPhone }}&text=Olá%20{{ urlencode($message->name) }},%20retorno%20do%20Souza%20Pereira%20Advocacia%20a%20respeito%20do%20seu%20contato."
                    target="_blank"
                    rel="noopener noreferrer"
                    class="px-4 py-2 bg-[#25D366] text-white text-xs font-semibold rounded hover:brightness-105 transition-all flex items-center gap-1.5"
                >
                    <span class="material-symbols-outlined text-[16px]">chat</span>
                    Responder pelo WhatsApp
                </a>
            @endif
        </div>
    </div>
</x-admin.layouts.app>
