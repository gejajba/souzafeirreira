<?php

beforeEach(function () {
    $this->seed();
});

test('homepage renders successfully with all official content from souzapereira.com', function () {
    $response = $this->get('/');

    $response->assertOk();

    // Identidade do escritório e Dr. Marcelo Luiz
    $response->assertSee('Souza Pereira');
    $response->assertSee('Marcelo Luiz S. Pereira');
    $response->assertSee('Gravataí • Rio Grande do Sul');
    $response->assertSee('Rua Ary Tubbs 569 sala 303 Centro', false);
    $response->assertSee('94.010-180', false);

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
