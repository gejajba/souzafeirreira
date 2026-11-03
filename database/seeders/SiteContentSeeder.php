<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Pillar;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Usuário Administrador padrão para acesso ao backend
        User::updateOrCreate(
            ['email' => 'admin@souzapereira.com'],
            [
                'name' => 'Dr. Marcelo Luiz Souza Pereira',
                'password' => Hash::make('admin123456'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Configurações Gerais e Institucionais
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_title' => 'Souza Pereira Advocacia',
                'site_subtitle' => 'Advocacia Estratégica',
                'meta_description' => 'Souza Pereira Advocacia — Escritório dedicado à orientação e atuação jurídica com seriedade, atenção individualizada e compromisso profissional.',
                'location_badge' => 'Gravataí • Rio Grande do Sul',
                'hero_title' => 'Compromisso jurídico. Atuação próxima e responsável.',
                'hero_subtitle' => 'Souza Pereira Advocacia é um escritório dedicado à orientação e à atuação jurídica com seriedade, atenção individualizada e compromisso ético na defesa de seus direitos fundamentais e patrimoniais.',
                'metric_1_number' => '2020',
                'metric_1_label' => 'Fundação em Gravataí',
                'metric_2_number' => '100%',
                'metric_2_label' => 'Atendimento Direto',
                'metric_3_number' => 'RS & BR',
                'metric_3_label' => 'Atuação Abrangente',
                'about_founder_name' => 'Marcelo Luiz S. Pereira',
                'about_founder_title' => 'Advogado Fundador & Responsável Técnico',
                'about_founder_oab' => 'Inscrição na OAB Rio Grande do Sul',
                'about_text_1' => 'Souza Pereira Advocacia é um escritório fundado em janeiro de 2020 e dirigido por Marcelo Luiz Souza Pereira, advogado especializado em direito bancário, civil e trabalhista. O escritório conta com uma rede de advogados parceiros especializados em diversas áreas do direito, garantindo um atendimento abrangente e especializado.',
                'about_text_2' => 'Na Souza Pereira Advocacia, cada cliente é tratado como único, o que nos diferencia no mercado. Nosso atendimento personalizado se destaca pelo contato próximo com nossos clientes, oferecendo meios de comunicação eficientes e acesso facilitado aos nossos profissionais do direito.',
                'about_quote' => '“Aliamos rigor técnico, utilização estratégica de novos meios digitais e a prática artesanal da advocacia.”',
                'about_quote_author' => '— Souza Pereira Advocacia',
                'phone' => '(51) 99920-1927',
                'whatsapp_url' => 'https://api.whatsapp.com/send/?phone=5551999201927&text&type=phone_number&app_absent=0',
                'email' => 'contato@souzapereira.com',
                'address' => 'Rua Ary Tubbs 569 sala 303 Centro – Gravataí/RS Cep 94.010-180',
            ]
        );

        // 3. Serviços Oficiais
        $services = [
            [
                'order' => 1,
                'title' => 'Busca e Apreensão',
                'slug' => 'busca-apreensao',
                'subtitle' => 'Defesa de Veículos & Patrimônio',
                'short_description' => 'Oferecemos suporte completo e orientação especializada na defesa de clientes em processos de busca e apreensão de veículos. Negociamos condições favoráveis e garantimos a proteção do seu patrimônio através de um monitoramento constante do processo.',
                'full_description' => 'Oferecemos suporte completo e orientação especializada na defesa de clientes em processos de busca e apreensão de veículos. Negociamos condições favoráveis e garantimos a proteção do seu patrimônio através de um monitoramento constante do processo.',
                'active' => true,
            ],
            [
                'order' => 2,
                'title' => 'Ação Revisional',
                'slug' => 'acao-revisional',
                'subtitle' => 'Readequação de Contratos & Juros',
                'short_description' => 'Através de uma ação revisional é possível verificar não apenas os juros de financiamento, mas também todas as taxas indevidas que oneram seu contrato. Discutimos a validade dessas taxas e buscamos a redução das parcelas segundo a taxa média do Banco Central.',
                'full_description' => 'Através de uma ação revisional é possível verificar não apenas os juros de financiamento, mas também todas as taxas indevidas que oneram seu contrato. No processo, discutimos a validade dessas taxas e buscamos a redução do valor das prestações com base na readequação dos encargos de acordo a taxa média do Banco Central para a época do seu contrato. Não pague juros abusivos, pague o valor justo.',
                'active' => true,
            ],
            [
                'order' => 3,
                'title' => 'Direito do Trabalho',
                'slug' => 'direito-trabalho',
                'subtitle' => 'Provas Digitais & Assessoria Preventiva',
                'short_description' => 'Atuamos na defesa de empregados e empregadores, com abordagem técnica especializada utilizando novos meios de provas digitais e tecnologia no direito do trabalho, além de atuação preventiva para a segurança do seu negócio.',
                'full_description' => 'Atuamos na defesa de empregados e empregadores, oferecendo uma abordagem técnica especializada que utiliza novos meios de provas digitais e todo acervo tecnológico admitidos no direito do trabalho. Além disso, focamos na atuação preventiva para garantir a segurança e eficiência do seu negócio.',
                'active' => true,
            ],
            [
                'order' => 4,
                'title' => 'Direito Previdenciário',
                'slug' => 'direito-previdenciario',
                'subtitle' => 'INSS & Planejamento Pós-Reforma',
                'short_description' => 'Abordagem técnica e assertiva no cenário pós-reforma da previdência. Planejamento previdenciário e assistência em requerimentos como correção de CNIS, auxílio-doença, licença-maternidade, BPC-LOAS, pensão por morte e aposentadorias.',
                'full_description' => 'Em um cenário pós-reforma que dificultou o acesso à seguridade social, propomos uma abordagem técnica e assertiva para a obtenção dos benefícios. Oferecemos planejamento previdenciário e assistência em requerimentos como correção de CNIS, auxílio-doença, licença-maternidade, BPC-LOAS, pensão por morte, aposentadoria e outros.',
                'active' => true,
            ],
            [
                'order' => 5,
                'title' => 'Direito Civil',
                'slug' => 'direito-civil',
                'subtitle' => 'Família, Sucessões, Imóveis & Contratos',
                'short_description' => 'Defendemos seus direitos em diversas áreas do direito civil, incluindo casos de família (divórcio, dissolução de união estável, pensão), contratos, inventários, usucapião, execução de títulos, direito imobiliário e consumidor.',
                'full_description' => 'Defendemos seus direitos em diversas áreas do direito civil, incluindo casos de família como divórcio, dissolução de união estável, pensão alimentícia, além de questões relacionadas a contratos, inventários, usucapião, execução de títulos, direito imobiliário e defesa do consumidor. Garantimos uma representação eficiente, voltada para uma advocacia que integra os novos meios tecnológicos com a prática artesanal, diferenciando-se da advocacia de massa.',
                'active' => true,
            ],
            [
                'order' => 6,
                'title' => 'Direito Penal',
                'slug' => 'direito-penal',
                'subtitle' => 'Defesa Estratégica & Garantias',
                'short_description' => 'Análise minuciosa de inquéritos e autos processuais, verificação da legalidade dos atos de persecução penal e estratégias específicas para a salvaguarda da liberdade individual e garantias fundamentais.',
                'full_description' => 'Enfrentar um processo criminal que coloca em risco a sua liberdade exige um advogado capaz de realizar uma análise minuciosa de todos os documentos, incluindo ocorrências, inquéritos e autos do processo. É fundamental verificar a legalidade dos atos da persecução penal e desenvolver estratégias específicas para cada caso, assegurando o melhor resultado possível. Confie em nossa experiência para representá-lo e garantir uma defesa técnica e dedicada, sempre a seu favor.',
                'active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }

        // 4. Pilares de Conduta
        $pillars = [
            [
                'order' => 1,
                'number' => 'PILAR I',
                'title' => 'Atendimento Individualizado',
                'description' => 'Tratamento não massificado. O cliente fala e alinha estratégias diretamente com os advogados encarregados, garantindo que suas angústias e objetivos específicos orientem cada peça processual.',
                'tag' => 'Acompanhamento Direto',
                'icon' => 'support_agent',
                'active' => true,
            ],
            [
                'order' => 2,
                'number' => 'PILAR II',
                'title' => 'Clareza e Transparência',
                'description' => 'Comunicação descomplicada, relatórios de andamento pontuais e expectativas realistas fundamentadas na jurisprudência predominante, sem promessas vazias ou falsas garantias de resultado.',
                'tag' => 'Linguagem Acessível',
                'icon' => 'visibility',
                'active' => true,
            ],
            [
                'order' => 3,
                'number' => 'PILAR III',
                'title' => 'Rigor Técnico e Ética',
                'description' => 'Pesquisa aprofundada de precedentes, domínio de súmulas vinculantes dos tribunais superiores e fidelidade incondicional aos preceitos éticos prescritos pelo Estatuto da Advocacia e CFOAB.',
                'tag' => 'Solidez Dogmática',
                'icon' => 'balance',
                'active' => true,
            ],
        ];

        foreach ($pillars as $pillar) {
            Pillar::updateOrCreate(
                ['number' => $pillar['number']],
                $pillar
            );
        }

        // 5. Artigos com Conteúdo Integral e Detalhado
        $articles = [
            [
                'order' => 1,
                'category' => 'Direito Bancário',
                'tag' => 'Financiamentos & Juros',
                'title' => 'Parâmetros judiciais na revisão de contratos de financiamento e encargos',
                'slug' => 'parametros-judiciais-revisao-contratos-financiamento',
                'summary' => 'Como os tribunais estaduais e o STJ aplicam o Tema 246 e a verificação empírica de taxas médias de mercado frente à capitalização de juros remuneratórios.',
                'content' => '## O Cenário das Operações de Financiamento no Brasil

Nos contratos de mútuo bancário, especialmente aqueles voltados ao financiamento de veículos e crédito pessoal, é recorrente a constatação de descompassos entre as taxas pactuadas e a média praticada pelas instituições financeiras no Sistema Financeiro Nacional (SFN).

A revisão judicial de contratos bancários não visa a inadimplência ou a desconstituição voluntária de obrigações assumidas, mas sim o restabelecimento do equilíbrio econômico-financeiro com base na função social do contrato e nas diretrizes do Código de Defesa do Consumidor (Súmula 297 do STJ).

---

### A Taxa Média de Mercado do BACEN e o Tema 246 do STJ

O Superior Tribunal de Justiça, ao fixar tese sob o rito dos recursos repetitivos (Tema 246), consolidou entendimento de que as instituições financeiras não sofrem limitação de juros remuneratórios ao patamar de 12% ao ano (revogação do Decreto 22.626/33 para o SFN). Contudo, a estipulação de juros em patamares substancialmente superiores à taxa média divulgada pelo Banco Central do Brasil para a mesma modalidade e época da contratação configura desvantagem exagerada e abusividade.

Na prática forense, adota-se predominantemente o critério objetivo: índices que ultrapassem em 1,5 vez (ou percentual desproporcional) a taxa média do BACEN ensejam a readequação judicial ao parâmetro médio de mercado, com o recálculo do saldo devedor e a restituição ou compensação do indébito.

---

### Tarifas Administrativas Comumente Questionadas

Além dos juros remuneratórios e de sua capitalização mensal (que exige expressa pactuação conforme Súmula 539 do STJ), outros encargos são objeto frequente de expurgo judicial:

1. **Tarifa de Emissão de Carnê (TEC) e Abertura de Crédito (TAC):** Ilícitas em contratos celebrados após 30/04/2008 (Tema 618/STJ).
2. **Tarifa de Avaliação de Bem e Registro de Contrato:** Válidas apenas quando houver a efetiva prestação do serviço e não houver onerosidade excessiva (Tema 958/STJ).
3. **Seguro Prestamista com Venda Casada:** É vedada a imposição de contratação de seguro exclusivamente com a seguradora vinculada à instituição financeira (Tema 972/STJ).

---

### Conclusão e Cuidados Práticos

Antes de propor a ação revisional, a realização de perícia contábil prévia ou parecer técnico financeiro é indispensável para verificar a viabilidade da demanda, evitando aventuras jurídicas e delineando com precisão o valor incontverso a ser consignado.',
                'published_at' => now()->subDays(12),
                'active' => true,
            ],
            [
                'order' => 2,
                'category' => 'Direito do Trabalho',
                'tag' => 'Inovação Probatória',
                'title' => 'Novos meios de prova digital no âmbito das relações de trabalho',
                'slug' => 'novos-meios-de-prova-digital-relacoes-de-trabalho',
                'summary' => 'A validade jurídica de registros eletrônicos, trocas de mensagens instantâneas e a ata notarial eletrônica para a comprovação de horas e assédio.',
                'content' => "## A Revolução Digital no Contencioso Trabalhista

A consolidação de ferramentas de comunicação instantânea, aplicativos de geolocalização e sistemas corporativos em nuvem transformou substancialmente a produção de provas perante a Justiça do Trabalho. Questões como jornada extraordinária, sobreaviso e assédio moral, outrora dependentes de prova testemunhal, hoje encontram amparo probatório altamente fidedigno em registros eletrônicos.

---

### Mensagens de WhatsApp e E-mails Corporativos

Conversas em aplicativos de mensagens instantâneas possuem pleno valor probatório na esfera trabalhista, desde que respeitados os requisitos de autenticidade, integridade e licitude na obtenção. 

- **Assédio e Excesso de Jornada:** Mensagens enviadas fora do horário contratual, cobranças reiteradas em finais de semana e feriados servem como fortes indícios de conexão indevida e direito à desconexão.
- **Cadeia de Custódia:** Não basta o mero 'print de tela', facilmente contestável por montagens ou descontextualização. É imperativo preservar metadados ou utilizar ferramentas tecnológicas de preservação com carimbo de tempo (*blockchain* ou ata notarial).

---

### Ata Notarial Eletrônica e Plataformas de Preservação

A ata notarial lavrada em tabelionato de notas (inclusive de forma eletrônica através da plataforma e-Notariado) possui fé pública (art. 384 do CPC) e atesta que o tabelião teve contato direto com o dispositivo e constatou a veracidade e cronologia das mensagens.

Adicionalmente, laudos periciais de extração forense digital com verificação de *hash* SHA-256 têm sido amplamente acolhidos pelos Tribunais Regionais do Trabalho (TRTs) e pelo TST, neutralizando alegações de adulteração probatória.

---

### Geolocalização e Registros de Ponto por Aplicativo

A coleta de dados de localização fornecida por operadoras de telefonia ou aplicativos de navegação (Google Timeline, telemetria veicular) exige cautela em relação à Lei Geral de Proteção de Dados (LGPD - Lei nº 13.709/2018). Quando autorizada judicialmente ou extraída pelo próprio titular dos dados, consubstancia meio eficaz para demonstrar o cumprimento de jornadas externas sem possibilidade de controle tradicional.",
                'published_at' => now()->subDays(5),
                'active' => true,
            ],
            [
                'order' => 3,
                'category' => 'Direito Previdenciário',
                'tag' => 'Pós-Reforma',
                'title' => 'Planejamento previdenciário: prevenção e assertividade no requerimento',
                'slug' => 'planejamento-previdenciario-prevencao-assertividade-requerimento',
                'summary' => 'O impacto do recolhimento extemporâneo no CNIS e como uma auditoria documental antecipada previne perdas financeiras irreversíveis junto ao INSS.',
                'content' => '## A Complexidade da Previdência após a EC 103/2019

A Emenda Constitucional nº 103/2019 reformulou profundamente o Regime Geral de Previdência Social (RGPS), extinguindo a aposentadoria por tempo de contribuição pura e estabelecendo diversas regras de transição (pedágio de 50%, pedágio de 100%, sistema de pontos e idade mínima progressiva).

Nesse novo panorama, a escolha do momento exato de requerer o benefício previdenciário deixou de ser uma decisão intuitiva para se tornar um cálculo estritamente financeiro e atuarial.

---

### O Extrato CNIS e os Indicadores de Pendência

O Cadastro Nacional de Informações Sociais (CNIS) é a base de dados central utilizada pelo INSS para conceder benefícios. Contudo, é comum encontrar indicadores de inconsistência que, se não sanados antes do protocolo, resultam em indeferimento ou redução substancial da Renda Mensal Inicial (RMI):

- **IREC-EXT (Recolhimento Extemporâneo):** Contribuições vertidas com atraso pelo segurado contribuinte individual, que exigem comprovação de atividade remunerada para serem validadas.
- **PEXT (Período Extemporâneo):** Vínculos empregatícios registrados no sistema sem a correspondente baixa na CTPS ou dados divergentes no CAGED.
- **PREC-MENOR-MIN (Recolhimento Inferior ao Salário Mínimo):** Desde novembro de 2019, meses com contribuição inferior ao mínimo não contam nem para carência nem para tempo de contribuição, demandando complementação voluntária.

---

### Benefícios Práticos do Planejamento Prévio

1. **Maximização do Coeficiente de Cálculo:** Uma simulação detalhada pode apontar que aguardar alguns meses a mais para atingir uma regra de pedágio de 100% gera um benefício integral, ao passo que a regra geral imporia um redutor severo.
2. **Reconhecimento de Período Especial (Insalubridade/Periculosidade):** Conversão de tempo exercido sob agentes nocivos físicos ou químicos com PPP (Perfil Profissiográfico Previdenciário) devidamente retificado.
3. **Cômputo de Período Rural e Militar:** Resgate de tempo de atividade em regime de economia familiar na juventude, antecipando o direito em anos.

O planejamento previdenciário protege o segurado contra perdas financeiras perpétuas e confere segurança patrimonial a quem dedicou a vida ao trabalho.',
                'published_at' => now()->subDay(),
                'active' => true,
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }
}
