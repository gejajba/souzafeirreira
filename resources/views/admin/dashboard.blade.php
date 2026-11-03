<x-admin.layouts.app>
    <x-slot:header>
        Visão Geral do Escritório
    </x-slot:header>

    <!-- Cards de Métricas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Serviços Ativos -->
        <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs uppercase font-semibold text-text-muted">Serviços / Áreas</span>
                <span class="material-symbols-outlined text-secondary text-[24px]">gavel</span>
            </div>
            <div class="text-3xl font-bold text-primary">{{ $totalServices }}</div>
            <a href="{{ route('admin.services.index') }}" class="text-xs text-secondary hover:underline mt-2 inline-block">
                Gerenciar áreas &rarr;
            </a>
        </div>

        <!-- Mensagens Recebidas -->
        <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs uppercase font-semibold text-text-muted">Total de Mensagens</span>
                <span class="material-symbols-outlined text-secondary text-[24px]">mail</span>
            </div>
            <div class="text-3xl font-bold text-primary">{{ $totalMessages }}</div>
            <a href="{{ route('admin.messages.index') }}" class="text-xs text-secondary hover:underline mt-2 inline-block">
                Ver todas &rarr;
            </a>
        </div>

        <!-- Mensagens Não Lidas -->
        <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs uppercase font-semibold text-text-muted">Não Lidas</span>
                <span class="material-symbols-outlined text-amber-600 text-[24px]">mark_email_unread</span>
            </div>
            <div class="text-3xl font-bold {{ $unreadMessagesCount > 0 ? 'text-amber-600' : 'text-primary' }}">
                {{ $unreadMessagesCount }}
            </div>
            <a href="{{ route('admin.messages.index', ['unread' => 1]) }}" class="text-xs text-secondary hover:underline mt-2 inline-block">
                Filtrar não lidas &rarr;
            </a>
        </div>

        <!-- Pilares e Artigos -->
        <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs uppercase font-semibold text-text-muted">Pilares &amp; Artigos</span>
                <span class="material-symbols-outlined text-secondary text-[24px]">auto_stories</span>
            </div>
            <div class="text-3xl font-bold text-primary">{{ $totalPillars + $totalArticles }}</div>
            <div class="text-xs text-text-muted mt-2">
                {{ $totalPillars }} pilares | {{ $totalArticles }} artigos
            </div>
        </div>
    </div>

    <!-- Seção de Ações Rápidas & Mensagens Recentes -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Mensagens Recentes -->
        <div class="lg:col-span-8 bg-surface-container-lowest p-6 border border-border-light shadow-sm">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-border-light">
                <h2 class="font-headline-sm text-lg text-primary font-bold">Últimas Mensagens Recebidas</h2>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-secondary hover:underline">
                    Ver todas as mensagens
                </a>
            </div>

            @if($recentMessages->isEmpty())
                <div class="py-12 text-center text-text-muted text-sm">
                    <span class="material-symbols-outlined text-[36px] text-text-muted mb-2 block">inbox</span>
                    Nenhuma mensagem recebida até o momento.
                </div>
            @else
                <div class="divide-y divide-border-light">
                    @foreach($recentMessages as $msg)
                        <div class="py-3.5 flex items-center justify-between hover:bg-surface-container-low px-2 transition-colors">
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="w-2.5 h-2.5 rounded-full {{ $msg->is_read ? 'bg-gray-300' : 'bg-secondary' }}"></span>
                                <div class="truncate">
                                    <div class="font-semibold text-sm text-primary truncate">{{ $msg->name }}</div>
                                    <div class="text-xs text-text-muted truncate">
                                        {{ $msg->email }} • {{ $msg->service ?? 'Geral' }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 shrink-0">
                                <span class="text-xs text-text-muted">{{ $msg->created_at->diffForHumans() }}</span>
                                <a
                                    href="{{ route('admin.messages.show', $msg) }}"
                                    class="px-2.5 py-1 text-xs bg-surface-subtle hover:bg-primary-container hover:text-on-primary transition-colors font-medium rounded"
                                >
                                    Ver Detalhes
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Ações e Atalhos -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm">
                <h3 class="font-headline-sm text-base text-primary font-bold mb-4">Ações Rápidas</h3>
                <div class="space-y-3">
                    <a
                        href="{{ route('admin.services.create') }}"
                        class="flex items-center gap-3 p-3 bg-surface-subtle hover:bg-surface-container-high transition-colors rounded text-sm font-medium text-primary"
                    >
                        <span class="material-symbols-outlined text-secondary">add_circle</span>
                        Cadastrar Novo Serviço
                    </a>
                    <a
                        href="{{ route('admin.settings.edit') }}"
                        class="flex items-center gap-3 p-3 bg-surface-subtle hover:bg-surface-container-high transition-colors rounded text-sm font-medium text-primary"
                    >
                        <span class="material-symbols-outlined text-secondary">tune</span>
                        Editar Textos do Site
                    </a>
                    <a
                        href="{{ route('home') }}"
                        target="_blank"
                        class="flex items-center gap-3 p-3 bg-surface-subtle hover:bg-surface-container-high transition-colors rounded text-sm font-medium text-primary"
                    >
                        <span class="material-symbols-outlined text-secondary">public</span>
                        Abrir Site em Nova Aba
                    </a>
                </div>
            </div>

            <!-- Dados Rápidos de Contato -->
            <div class="bg-surface-container-lowest p-6 border border-border-light shadow-sm text-xs space-y-2">
                <h4 class="font-bold text-primary uppercase tracking-wider mb-2">Dados Atuais do Escritório</h4>
                <p><strong class="text-primary">Telefone / WhatsApp:</strong> {{ $settings->phone }}</p>
                <p><strong class="text-primary">E-mail:</strong> {{ $settings->email }}</p>
                <p><strong class="text-primary">Sede:</strong> {{ $settings->address }}</p>
            </div>
        </div>
    </div>
</x-admin.layouts.app>
