@php
    $professionals = [
        [
            'name' => 'Marcelo Luiz Souza Pereira',
            'oab' => 'OAB/RS 132.623',
            'image' => 'images/equipes/marcelo-souza-pereira.png',
            'education' => 'Graduado pela Universidade Cruzeiro do Sul.',
            'description' => 'Atuação voltada ao Direito Empresarial e ao assessoramento jurídico especializado, com experiência em Direito Bancário, gestão de passivos bancários, ações revisionais e defesa dos direitos dos consumidores, especialmente em processos de busca e apreensão de veículos.',
            'specialties' => ['Direito Empresarial', 'Direito Bancário', 'Direito do Consumidor'],
        ],
        [
            'name' => 'Juliano Michielin Rodrigues',
            'oab' => 'OAB/RS 140.764',
            'image' => 'images/equipes/juliano-michielin-rodrigue.png',
            'education' => 'Graduado pela Pontifícia Universidade Católica (PUC) e pós-graduando em Direito de Família e Sucessões pela Fundação Escola Superior do Ministério Público.',
            'description' => 'Atua nas áreas de Direito de Família, Inventários, Direito Imobiliário e Usucapião.',
            'specialties' => ['Direito de Família e Sucessões', 'Inventários', 'Direito Imobiliário e Usucapião'],
        ],
        [
            'name' => 'Lourdes Boeira Batista',
            'oab' => 'OAB/RS 53.085',
            'image' => 'images/equipes/lourdes-boeira-batista.png',
            'education' => 'Graduada pela Universidade Luterana do Brasil (ULBRA).',
            'description' => 'Possui ampla experiência em Direito Previdenciário e Direito do Trabalho, com atuação destacada em questões relacionadas à Seguridade Social, benefícios previdenciários e relações trabalhistas.',
            'specialties' => ['Direito Previdenciário', 'Direito do Trabalho', 'Seguridade Social'],
        ],
    ];
@endphp

<section class="w-full bg-surface py-space-3xl" id="equipe" aria-labelledby="equipe-titulo">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-space-xl lg:px-margin">
        <div class="max-w-4xl mb-space-2xl">
            <span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.25em] mb-space-xs block">02 — NOSSA EQUIPE</span>
            <h2 id="equipe-titulo" class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary leading-tight">
                Profissionais que unem conhecimento, experiência e compromisso.
            </h2>
            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mt-space-md max-w-3xl">
                Conheça os advogados que integram o Souza Pereira Advocacia Especializada e atuam na busca de soluções jurídicas com responsabilidade e dedicação.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-gutter">
            @foreach ($professionals as $professional)
                <article class="group flex flex-col overflow-hidden border border-border-light bg-surface-container-lowest shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative aspect-[4/5] overflow-hidden bg-primary-container">
                        <img
                            src="{{ asset($professional['image']) }}"
                            alt="Retrato profissional de {{ $professional['name'] }}"
                            class="h-full w-full object-cover object-top transition-transform duration-500 group-hover:scale-105"
                            width="1000"
                            height="1250"
                            loading="lazy"
                            decoding="async"
                            onerror="this.classList.add('hidden'); this.nextElementSibling.classList.remove('hidden');"
                        >
                        <div class="hidden absolute inset-0 flex flex-col items-center justify-center gap-space-sm p-space-lg text-center text-surface-bright" aria-hidden="true">
                            <span class="material-symbols-outlined text-secondary-fixed text-4xl">account_balance</span>
                            <span class="font-headline-sm text-headline-sm">{{ $professional['name'] }}</span>
                        </div>
                    </div>

                    <div class="flex flex-1 flex-col p-space-lg">
                        <div class="border-b border-border-light pb-space-md">
                            <h3 class="font-headline-sm text-headline-sm text-primary leading-snug">{{ $professional['name'] }}</h3>
                            <p class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.16em] mt-space-xs">{{ $professional['oab'] }}</p>
                        </div>

                        <div class="flex flex-1 flex-col gap-space-md pt-space-md">
                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">{{ $professional['education'] }}</p>
                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">{{ $professional['description'] }}</p>
                        </div>

                        <ul class="flex flex-wrap gap-space-sm pt-space-lg mt-space-lg border-t border-border-light" aria-label="Áreas de atuação de {{ $professional['name'] }}">
                            @foreach ($professional['specialties'] as $specialty)
                                <li class="bg-surface-subtle px-space-sm py-space-xs font-caption text-caption text-primary">{{ $specialty }}</li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
