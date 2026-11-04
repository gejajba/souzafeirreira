<?php

beforeEach(function () {
    $this->seed();
});

test('homepage renders successfully with all official content from souzapereira.com', function () {
    $response = $this->get('/');

    $response->assertOk();

    // Identidade do escritório e equipe
    $response->assertSee('Souza Pereira');
    $response->assertSee('Marcelo Luiz S. Pereira');
    $response->assertSee('Gravataí • Rio Grande do Sul');
    $response->assertSee('Av. Alexandrino de Alencar, 949, Sala 01', false);
    $response->assertSee('Bairro Morada do Vale I', false);
    $response->assertSee('94085-120', false);

    // Equipe institucional e respectivas credenciais profissionais
    $response->assertSee('id="equipe"', false);
    $response->assertSee('Profissionais que unem conhecimento, experiência e compromisso.');
    $response->assertSee('Marcelo Luiz Souza Pereira');
    $response->assertSee('OAB/RS 132.623');
    $response->assertSee('Juliano Michielin Rodrigues');
    $response->assertSee('OAB/RS 140.764');
    $response->assertSee('Lourdes Boeira Batista');
    $response->assertSee('OAB/RS 53.085');
    $response->assertSee('images/equipes/marcelo-souza-pereira.png', false);
    $response->assertSee('images/equipes/juliano-michielin-rodrigue.png', false);
    $response->assertSee('images/equipes/lourdes-boeira-batista.png', false);
    $response->assertSee('aspect-[4/5]', false);
    $response->assertSee('01 — SOBRE NÓS');
    $response->assertSee('Advocacia de excelência fundada em relações de confiança e proximidade.');

    // Serviços com texto oficial exato
    $response->assertSee('Busca e Apreensão');
    $response->assertSee('Ação Revisional');
    $response->assertSee('Direito do Trabalho');
    $response->assertSee('Direito Previdenciário');
    $response->assertSee('Direito Civil');
    $response->assertSee('Direito Penal');

    // Telefones e links
    $response->assertSee('99920-1927');
    $response->assertSee('https://api.whatsapp.com/send/?phone=5551999201927', false);

    // Imagens locais baixadas
    $response->assertSee('img/logo.jpeg');
    $response->assertSee('img/souza-foto.jpeg');
    $response->assertSee('img/banner-novo.png');

    // Favicon oficial
    $response->assertSee('favicon.ico');
    $response->assertSee('favicon-32x32.png');

    // Hero texto sobreposto e visível
    $response->assertSee('Atendimento Personalizado');
    $response->assertSee('Consultas online e assessoria presencial especializada.');

    // Rodapé com mapa clicável gratuito (Google Maps)
    $response->assertSee('https://www.google.com/maps/search/?api=1&query=', false);
    $response->assertSee('Abrir endereço no mapa (Google Maps)');

    // SEO, Open Graph & Schema.org Local SEO
    $response->assertSee('<link rel="canonical"', false);
    $response->assertSee('property="og:type" content="website"', false);
    $response->assertSee('name="geo.region" content="BR-RS"', false);
    $response->assertSee('name="geo.placename" content="Gravataí"', false);
    $response->assertSee('"@type": "LegalService"', false);
    $response->assertSee('Av. Alexandrino de Alencar, 949, Sala 01', false);

    // Rodapé com créditos Legis Studio e sem textos removidos
    $response->assertSee('Feito pela <span class="text-surface-bright font-medium">Legis Studio</span>.', false);
    $response->assertDontSee('Aviso de Confidencialidade');
    $response->assertDontSee('Em conformidade com o Provimento nº 205/2021 do CFOAB');
    $response->assertDontSee('Inscrição OAB/RS • Atendimento Personalizado');
});

test('lgpd page renders successfully with privacy governance details', function () {
    $response = $this->get('/lgpd');

    $response->assertOk();
    $response->assertSee('Política de Privacidade &amp; Governança de Dados', false);
    $response->assertSee('Lei Geral de Proteção de Dados (Lei nº 13.709/2018)');
    $response->assertSee('Identificação do Controlador');
    $response->assertSee('Canal do Encarregado pelo Tratamento de Dados (DPO)');
    $response->assertSee('Feito pela <span class="text-surface-bright font-medium">Legis Studio</span>.', false);
});

test('sitemap.xml is generated with valid xml structure and article routes', function () {
    $response = $this->get('/sitemap.xml');

    $response->assertOk();
    $response->assertHeader('Content-Type', 'application/xml; charset=utf-8');
    $response->assertSee('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', false);
    $response->assertSee(route('home'));
    $response->assertSee(route('articles.index'));
    $response->assertSee(route('lgpd'));
    $response->assertSee('parametros-judiciais-revisao-contratos-financiamento');
});
