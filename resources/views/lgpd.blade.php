<x-layouts.app :settings="$settings" :title="'Política de Privacidade e Proteção de Dados (LGPD) | ' . $settings->site_title">
    <x-header :settings="$settings" />

    <main class="min-h-screen pt-20 bg-surface">
        <!-- Hero Editorial Institucional -->
        <section class="bg-primary-container text-surface-bright py-space-2xl md:py-space-3xl border-b border-border-dark relative overflow-hidden">
            <div class="max-w-[1040px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin relative z-10">
                <!-- Breadcrumbs -->
                <nav aria-label="Navegação estrutural" class="flex items-center gap-2 font-caption text-caption text-secondary-fixed-dim uppercase tracking-wider mb-space-md">
                    <a href="{{ route('home') }}" class="hover:text-surface-bright transition-colors">Início</a>
                    <span>/</span>
                    <span class="text-surface-bright">Privacidade &amp; LGPD</span>
                </nav>

                <div class="w-full">
                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-tertiary-container text-on-tertiary-container font-caption text-caption uppercase tracking-[0.2em] mb-4 border border-border-dark">
                        <span class="material-symbols-outlined text-[15px] text-secondary-fixed-dim">verified_user</span>
                        Lei Geral de Proteção de Dados (Lei nº 13.709/2018)
                    </span>
                    <h1 class="font-headline-lg text-headline-lg md:text-display-sm text-surface-bright font-bold leading-tight mb-space-md">
                        Política de Privacidade &amp; Governança de Dados
                    </h1>
                    <p class="font-body-lg text-body-lg text-on-primary-container leading-relaxed max-w-3xl">
                        Compromisso institucional do escritório {{ $settings->site_title }} com a transparência, salvaguarda de dados pessoais e preservação do sigilo profissional inerente ao exercício da advocacia.
                    </p>
                    <div class="mt-space-md flex flex-wrap items-center gap-4 text-caption text-secondary-fixed-dim">
                        <span>Última atualização: Novembro de {{ date('Y') }}</span>
                        <span>•</span>
                        <span>Versão 1.2 — Vigência imediata</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Corpo do Documento Normativo -->
        <section class="py-space-2xl md:py-space-3xl">
            <div class="max-w-[1040px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
                <div class="bg-surface-container-lowest border border-border-light p-space-lg md:p-space-2xl shadow-sm space-y-12">
                    
                    <!-- 1. Apresentação & Compromisso Ético -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="font-headline-sm text-secondary font-bold text-xl">01.</span>
                            <h2 class="font-headline-sm text-2xl text-primary font-bold">
                                Apresentação e Compromisso Institucional
                            </h2>
                        </div>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            O escritório <strong class="text-primary">{{ $settings->site_title }}</strong> preza pela integridade, ética, confidencialidade e segurança de todas as informações confiadas por clientes, consulentes e usuários que acessam nossos canais físicos e digitais.
                        </p>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            Esta Política de Privacidade descreve de maneira transparente como tratamos, coletamos, armazenamos e protegemos seus dados pessoais, em conformidade com os princípios da Lei Geral de Proteção de Dados Pessoais (Lei Federal nº 13.709/2018 – LGPD), do Marco Civil da Internet (Lei Federal nº 12.965/2014) e do Estatuto da Advocacia e da OAB (Lei Federal nº 8.906/1994).
                        </p>
                    </div>

                    <hr class="border-border-light">

                    <!-- 2. Papel de Controlador -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="font-headline-sm text-secondary font-bold text-xl">02.</span>
                            <h2 class="font-headline-sm text-2xl text-primary font-bold">
                                Identificação do Controlador
                            </h2>
                        </div>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            Para os fins da legislação aplicável, o Controlador responsável pelas decisões referentes ao tratamento de seus dados pessoais coletados neste ambiente é:
                        </p>
                        <div class="bg-surface-container p-space-md border-l-4 border-secondary space-y-1 text-body-sm text-primary font-medium">
                            <p><strong>Titularidade:</strong> {{ $settings->site_title }} ({{ $settings->site_subtitle }})</p>
                            <p><strong>Sede / Endereço:</strong> {{ $settings->address }}</p>
                            <p><strong>Comunicação Digital:</strong> {{ $settings->email }}</p>
                            <p><strong>Canal Oficial de Atendimento:</strong> {{ $settings->phone }}</p>
                        </div>
                    </div>

                    <hr class="border-border-light">

                    <!-- 3. Dados Coletados & Finalidades -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="font-headline-sm text-secondary font-bold text-xl">03.</span>
                            <h2 class="font-headline-sm text-2xl text-primary font-bold">
                                Dados Pessoais Coletados e Finalidades do Tratamento
                            </h2>
                        </div>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            Coletamos apenas as informações estritamente necessárias para a consecução de objetivos legítimos, divididos nas seguintes hipóteses:
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md pt-2">
                            <div class="p-space-md border border-border-light bg-surface space-y-2">
                                <h3 class="font-headline-sm text-lg text-primary font-semibold flex items-center gap-2">
                                    <span class="material-symbols-outlined text-secondary text-[20px]">person_check</span>
                                    Triagem &amp; Contato Inicial
                                </h3>
                                <p class="text-caption text-text-muted leading-relaxed">
                                    <strong>Dados:</strong> Nome completo, telefone/WhatsApp, endereço de e-mail e síntese do fato ou consulta jurídica relatada.
                                </p>
                                <p class="text-caption text-text-muted leading-relaxed">
                                    <strong>Finalidade:</strong> Retorno a dúvidas, verificação inicial de conflito de interesses, agendamento de reuniões e análise prévia de viabilidade jurídica (Art. 7º, V da LGPD).
                                </p>
                            </div>

                            <div class="p-space-md border border-border-light bg-surface space-y-2">
                                <h3 class="font-headline-sm text-lg text-primary font-semibold flex items-center gap-2">
                                    <span class="material-symbols-outlined text-secondary text-[20px]">gavel</span>
                                    Prestação de Serviços Jurídicos
                                </h3>
                                <p class="text-caption text-text-muted leading-relaxed">
                                    <strong>Dados:</strong> Documentação civil, dados cadastrais, bancários, contratuais e processuais necessários à causa contratada.
                                </p>
                                <p class="text-caption text-text-muted leading-relaxed">
                                    <strong>Finalidade:</strong> Elaboração de pareceres, ajuizamento e acompanhamento de medidas judiciais ou extrajudiciais e exercício regular de direitos em processo (Art. 7º, VI da LGPD).
                                </p>
                            </div>

                            <div class="p-space-md border border-border-light bg-surface space-y-2">
                                <h3 class="font-headline-sm text-lg text-primary font-semibold flex items-center gap-2">
                                    <span class="material-symbols-outlined text-secondary text-[20px]">router</span>
                                    Dados Técnicos de Navegação
                                </h3>
                                <p class="text-caption text-text-muted leading-relaxed">
                                    <strong>Dados:</strong> Endereço IP, data e hora da conexão, tipo de navegador e páginas acessadas neste portal.
                                </p>
                                <p class="text-caption text-text-muted leading-relaxed">
                                    <strong>Finalidade:</strong> Cumprimento de obrigação legal prevista no Art. 15 do Marco Civil da Internet e proteção contra tentativas de intrusão cibernética.
                                </p>
                            </div>

                            <div class="p-space-md border border-border-light bg-surface space-y-2">
                                <h3 class="font-headline-sm text-lg text-primary font-semibold flex items-center gap-2">
                                    <span class="material-symbols-outlined text-secondary text-[20px]">block</span>
                                    Não Comercialização
                                </h3>
                                <p class="text-caption text-text-muted leading-relaxed">
                                    <strong>Garantia Expressa:</strong> O escritório jamais comercializa, aluga ou cede listas de contatos para anunciantes ou plataformas terceiras de marketing invasivo.
                                </p>
                            </div>
                        </div>
                    </div>

                    <hr class="border-border-light">

                    <!-- 4. Sigilo Profissional -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="font-headline-sm text-secondary font-bold text-xl">04.</span>
                            <h2 class="font-headline-sm text-2xl text-primary font-bold">
                                Sigilo Profissional da Advocacia
                            </h2>
                        </div>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            Além das garantias da LGPD, o relacionamento com nossos clientes e os dados relatados em atendimentos contam com a proteção especial e reforçada do <strong>sigilo profissional</strong>, assegurado pelo Artigo 7º, inciso XIX, da Lei nº 8.906/1994 (Estatuto da Advocacia) e pelo Código de Ética e Disciplina da OAB.
                        </p>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            Nenhum colaborador ou parceiro do escritório tem autorização para violar o segredo profissional de fatos confiados na relação advocatícia.
                        </p>
                    </div>

                    <hr class="border-border-light">

                    <!-- 5. Compartilhamento Estritamente Operacional -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="font-headline-sm text-secondary font-bold text-xl">05.</span>
                            <h2 class="font-headline-sm text-2xl text-primary font-bold">
                                Compartilhamento com Terceiros
                            </h2>
                        </div>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            O compartilhamento de dados é restrito às hipóteses indispensáveis para o cumprimento do mandato outorgado ou ordens legais, incluindo:
                        </p>
                        <ul class="list-disc pl-6 space-y-2 font-body-sm text-text-muted">
                            <li>Órgãos do Poder Judiciário, cartórios, juizados, tribunais e repartições públicas administrativas perante os quais tramitem feitos de interesse do constituinte;</li>
                            <li>Peritos judiciais, assistentes técnicos e correspondentes jurídicos estritamente para o andamento de atos processuais em comarcas diversas;</li>
                            <li>Provedores de infraestrutura tecnológica (hospedagem de sistemas e backups criptografados) que atendam a rígidos padrões de segurança da informação;</li>
                            <li>Autoridades judiciais competentes mediante requisição fundamentada nos termos da lei.</li>
                        </ul>
                    </div>

                    <hr class="border-border-light">

                    <!-- 6. Segurança e Armazenamento -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="font-headline-sm text-secondary font-bold text-xl">06.</span>
                            <h2 class="font-headline-sm text-2xl text-primary font-bold">
                                Segurança da Informação e Prazos de Retenção
                            </h2>
                        </div>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            Adotamos salvaguardas técnicas e organizacionais compatíveis com os riscos das atividades, incluindo tráfego criptografado com certificados SSL/TLS, servidores em conformidade com protocolos de segurança cibernética e controles de acesso por perfis restritos.
                        </p>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            Os dados pessoais são retidos pelo tempo necessário para cumprir as finalidades para as quais foram coletados ou enquanto perdurar a relação contratual, observando-se os prazos prescricionais legais para salvaguarda de direitos em juízo e deveres de arquivo estipulados pela OAB.
                        </p>
                    </div>

                    <hr class="border-border-light">

                    <!-- 7. Direitos do Titular -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="font-headline-sm text-secondary font-bold text-xl">07.</span>
                            <h2 class="font-headline-sm text-2xl text-primary font-bold">
                                Direitos do Titular dos Dados (Art. 18 da LGPD)
                            </h2>
                        </div>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            Você possui direitos resguardados pela lei, que podem ser exercidos a qualquer momento, mediante requisição expressa e gratuita pelos nossos canais oficiais:
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                            <div class="p-3 bg-surface-container text-body-sm text-primary flex items-start gap-2">
                                <span class="material-symbols-outlined text-secondary text-[18px] shrink-0 mt-0.5">check_circle</span>
                                <span><strong>Confirmação e Acesso:</strong> Saber se tratamos seus dados e solicitar cópia.</span>
                            </div>
                            <div class="p-3 bg-surface-container text-body-sm text-primary flex items-start gap-2">
                                <span class="material-symbols-outlined text-secondary text-[18px] shrink-0 mt-0.5">check_circle</span>
                                <span><strong>Correção:</strong> Solicitar a atualização de dados incompletos ou inexatos.</span>
                            </div>
                            <div class="p-3 bg-surface-container text-body-sm text-primary flex items-start gap-2">
                                <span class="material-symbols-outlined text-secondary text-[18px] shrink-0 mt-0.5">check_circle</span>
                                <span><strong>Anonimização ou Bloqueio:</strong> Em caso de dados desnecessários ou excessivos.</span>
                            </div>
                            <div class="p-3 bg-surface-container text-body-sm text-primary flex items-start gap-2">
                                <span class="material-symbols-outlined text-secondary text-[18px] shrink-0 mt-0.5">check_circle</span>
                                <span><strong>Revogação do Consentimento:</strong> Quando o tratamento for baseado unicamente nesta hipótese.</span>
                            </div>
                        </div>
                    </div>

                    <hr class="border-border-light">

                    <!-- 8. Contato do Encarregado (DPO) -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="font-headline-sm text-secondary font-bold text-xl">08.</span>
                            <h2 class="font-headline-sm text-2xl text-primary font-bold">
                                Canal do Encarregado pelo Tratamento de Dados (DPO)
                            </h2>
                        </div>
                        <p class="font-body-md text-text-muted leading-relaxed">
                            Para exercer qualquer um de seus direitos como titular de dados pessoais ou para sanar dúvidas a respeito desta Política de Privacidade, entre em contato diretamente com nossa equipe encarregada:
                        </p>
                        <div class="bg-primary-container text-surface-bright p-space-lg flex flex-col md:flex-row items-start md:items-center justify-between gap-space-md border border-border-dark">
                            <div class="space-y-1">
                                <span class="font-label-caps text-label-caps text-secondary-fixed uppercase tracking-wider block">
                                    Canal Exclusivo de Privacidade
                                </span>
                                <p class="text-surface-bright font-semibold text-lg">
                                    {{ $settings->email }}
                                </p>
                                <p class="text-caption text-on-primary-container">
                                    Atendimento gratuito em dias úteis no horário de expediente forense.
                                </p>
                            </div>
                            <a
                                href="mailto:{{ $settings->email }}?subject=Solicita%C3%A7%C3%A3o%20LGPD%20-%20Titular%20de%20Dados"
                                class="inline-flex items-center justify-center px-space-lg py-space-sm bg-secondary text-primary font-semibold text-body-sm uppercase tracking-wider hover:bg-secondary-fixed transition-colors shrink-0"
                            >
                                Solicitar Atendimento LGPD
                            </a>
                        </div>
                    </div>

                    <hr class="border-border-light">

                    <!-- 9. Atualizações -->
                    <div class="space-y-2 text-caption text-text-muted">
                        <p>
                            <strong>Alterações desta Política:</strong> O escritório reserva-se o direito de atualizar este documento periodicamente para refletir aprimoramentos de conformidade e eventuais atualizações legislativas emitidas pela Autoridade Nacional de Proteção de Dados (ANPD).
                        </p>
                    </div>

                </div>

                <!-- Botão de Voltar -->
                <div class="mt-space-xl flex justify-center">
                    <a
                        href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 px-space-lg py-space-sm border border-primary text-primary hover:bg-primary hover:text-surface-bright transition-colors font-body-sm uppercase tracking-wider"
                    >
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                        <span>Retornar à Página Principal</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <x-footer :settings="$settings" />
    <x-whatsapp-button :settings="$settings" />
</x-layouts.app>