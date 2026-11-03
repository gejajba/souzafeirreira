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
});
