<?php

use App\Models\Article;
use App\Models\User;

beforeEach(function () {
    $this->seed();
});

test('public articles index page renders successfully', function () {
    $response = $this->get('/artigos');

    $response->assertOk();
    $response->assertSee('Artigos &amp; Análises Jurídicas', false);
    $response->assertSee('Parâmetros judiciais na revisão de contratos de financiamento');
});

test('article detail page renders with full content and author details', function () {
    $article = Article::where('slug', 'parametros-judiciais-revisao-contratos-financiamento')->first();

    $response = $this->get("/artigos/{$article->slug}");

    $response->assertOk();
    $response->assertSee($article->title);
    $response->assertSee($article->category);
    $response->assertSee('Marcelo Luiz S. Pereira');
    $response->assertSee('Tema 246 do STJ');
    $response->assertSee('Falar no WhatsApp');
});

test('inactive article returns 404 in public detail page', function () {
    $article = Article::factory()->create([
        'title' => 'Artigo Inativo de Teste',
        'slug' => 'artigo-inativo-teste',
        'active' => false,
    ]);

    $response = $this->get("/artigos/{$article->slug}");

    $response->assertNotFound();
});

test('admin can create and update articles with full content', function () {
    $admin = User::first();
    $this->actingAs($admin);

    $createResponse = $this->post('/admin/articles', [
        'title' => 'Novo Artigo sobre Direito Imobiliário',
        'slug' => 'novo-artigo-sobre-direito-imobiliario',
        'category' => 'Direito Civil',
        'tag' => 'Imóveis',
        'order' => 4,
        'summary' => 'Resumo do artigo imobiliário.',
        'content' => '## Título Interno\n\nTexto completo da análise jurídica.',
        'active' => '1',
    ]);

    $createResponse->assertRedirect(route('admin.articles.index'));
    $this->assertDatabaseHas('articles', [
        'slug' => 'novo-artigo-sobre-direito-imobiliario',
        'category' => 'Direito Civil',
    ]);

    // Visitar a página de detalhe recém-criada
    $detailResponse = $this->get('/artigos/novo-artigo-sobre-direito-imobiliario');
    $detailResponse->assertOk();
    $detailResponse->assertSee('Novo Artigo sobre Direito Imobiliário');
    $detailResponse->assertSee('Texto completo da análise jurídica.');
});
