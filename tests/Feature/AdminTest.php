<?php

use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('guest is redirected to login when accessing admin dashboard', function () {
    $response = $this->get('/admin');

    $response->assertRedirect('/admin/login');
});

test('admin can log in successfully and access dashboard', function () {
    $user = User::factory()->create([
        'email' => 'admin_test@souzapereira.com',
        'password' => bcrypt('secret123'),
    ]);

    $response = $this->post('/admin/login', [
        'email' => 'admin_test@souzapereira.com',
        'password' => 'secret123',
    ]);

    $response->assertRedirect('/admin');
    $this->assertAuthenticatedAs($user);

    $dashboardResponse = $this->get('/admin');
    $dashboardResponse->assertOk();
    $dashboardResponse->assertSee('Visão Geral do Escritório');
});

test('admin can update site settings', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->put('/admin/settings', [
        'site_title' => 'Souza Pereira Advocacia & Associados',
        'site_subtitle' => 'Advocacia Estratégica e Corporativa',
        'meta_description' => 'Assessoria jurídica com rigor técnico.',
        'location_badge' => 'Gravataí / RS',
        'hero_title' => 'Novo Título do Hero',
        'hero_subtitle' => 'Novo subtítulo do hero com mais detalhes.',
        'metric_1_number' => '2020',
        'metric_1_label' => 'Fundação',
        'metric_2_number' => '100%',
        'metric_2_label' => 'Personalizado',
        'metric_3_number' => 'RS / BR',
        'metric_3_label' => 'Abrangente',
        'about_founder_name' => 'Dr. Marcelo Luiz S. Pereira',
        'about_founder_title' => 'Diretor Jurídico',
        'about_founder_oab' => 'OAB/RS',
        'about_text_1' => 'Texto sobre nós 1 atualizado.',
        'about_text_2' => 'Texto sobre nós 2 atualizado.',
        'about_quote' => 'Frase de impacto.',
        'about_quote_author' => 'Souza Pereira',
        'phone' => '(51) 99920-1927',
        'whatsapp_url' => 'https://api.whatsapp.com/send/?phone=5551999201927',
        'email' => 'contato@souzapereira.com',
        'address' => 'Rua Ary Tubbs 569 sala 303 Centro – Gravataí/RS',
    ]);

    $response->assertRedirect(route('admin.settings.edit'));
    $this->assertDatabaseHas('site_settings', [
        'site_title' => 'Souza Pereira Advocacia & Associados',
        'hero_title' => 'Novo Título do Hero',
    ]);
});

test('admin can upload and remove hero and about founder images', function () {
    Storage::fake('public');

    $user = User::factory()->create();
    $this->actingAs($user);

    $heroFile = UploadedFile::fake()->image('custom-hero.png', 1200, 800);
    $founderFile = UploadedFile::fake()->image('custom-marcelo.jpg', 600, 800);

    $response = $this->put('/admin/settings', [
        'site_title' => 'Souza Pereira Advocacia',
        'site_subtitle' => 'Advocacia Estratégica',
        'meta_description' => 'Meta description',
        'location_badge' => 'Gravataí / RS',
        'hero_title' => 'Compromisso e Ética',
        'hero_subtitle' => 'Subtítulo do hero',
        'metric_1_number' => '2020',
        'metric_1_label' => 'Fundação',
        'metric_2_number' => '100%',
        'metric_2_label' => 'Direto',
        'metric_3_number' => 'BR',
        'metric_3_label' => 'Abrangente',
        'about_founder_name' => 'Marcelo Luiz S. Pereira',
        'about_founder_title' => 'Advogado Fundador',
        'about_founder_oab' => 'OAB/RS',
        'about_text_1' => 'Texto 1',
        'about_text_2' => 'Texto 2',
        'phone' => '(51) 99920-1927',
        'whatsapp_url' => 'https://api.whatsapp.com/send/?phone=5551999201927',
        'email' => 'contato@souzapereira.com',
        'address' => 'Gravataí/RS',
        'hero_image' => $heroFile,
        'about_founder_image' => $founderFile,
    ]);

    $response->assertRedirect(route('admin.settings.edit'));

    $settings = SiteSetting::current();
    expect($settings->hero_image)->not->toBeNull();
    expect($settings->about_founder_image)->not->toBeNull();
    Storage::disk('public')->assertExists($settings->hero_image);
    Storage::disk('public')->assertExists($settings->about_founder_image);

    // Verify home renders custom image urls
    $homeResponse = $this->get('/');
    $homeResponse->assertSee($settings->hero_image_url);
    $homeResponse->assertSee($settings->about_founder_image_url);

    // Verify removing custom images
    $removeResponse = $this->put('/admin/settings', [
        'site_title' => 'Souza Pereira Advocacia',
        'site_subtitle' => 'Advocacia Estratégica',
        'location_badge' => 'Gravataí / RS',
        'hero_title' => 'Compromisso e Ética',
        'hero_subtitle' => 'Subtítulo do hero',
        'metric_1_number' => '2020',
        'metric_1_label' => 'Fundação',
        'metric_2_number' => '100%',
        'metric_2_label' => 'Direto',
        'metric_3_number' => 'BR',
        'metric_3_label' => 'Abrangente',
        'about_founder_name' => 'Marcelo Luiz S. Pereira',
        'about_founder_title' => 'Advogado Fundador',
        'about_founder_oab' => 'OAB/RS',
        'about_text_1' => 'Texto 1',
        'about_text_2' => 'Texto 2',
        'phone' => '(51) 99920-1927',
        'whatsapp_url' => 'https://api.whatsapp.com/send/?phone=5551999201927',
        'email' => 'contato@souzapereira.com',
        'address' => 'Gravataí/RS',
        'remove_hero_image' => '1',
        'remove_about_founder_image' => '1',
    ]);

    $removeResponse->assertRedirect(route('admin.settings.edit'));
    $settings->refresh();
    expect($settings->hero_image)->toBeNull();
    expect($settings->about_founder_image)->toBeNull();
});

test('admin can create, update and delete a service', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    // 1. Create
    $createResponse = $this->post('/admin/services', [
        'title' => 'Direito Digital e LGPD',
        'slug' => 'direito-digital-lgpd',
        'subtitle' => 'Proteção de Dados e Compliance',
        'order' => 7,
        'short_description' => 'Assessoria em conformidade com a LGPD.',
        'full_description' => 'Mapeamento e governança de dados pessoais para empresas.',
        'active' => '1',
    ]);

    $createResponse->assertRedirect(route('admin.services.index'));
    $this->assertDatabaseHas('services', [
        'slug' => 'direito-digital-lgpd',
        'title' => 'Direito Digital e LGPD',
    ]);

    $service = Service::where('slug', 'direito-digital-lgpd')->first();

    // 2. Update
    $updateResponse = $this->put("/admin/services/{$service->id}", [
        'title' => 'Direito Digital e Proteção de Dados',
        'slug' => 'direito-digital-lgpd',
        'subtitle' => 'Compliance LGPD',
        'order' => 8,
        'short_description' => 'Assessoria em conformidade atualizada.',
        'full_description' => 'Mapeamento e governança completos.',
        'active' => '1',
    ]);

    $updateResponse->assertRedirect(route('admin.services.index'));
    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'title' => 'Direito Digital e Proteção de Dados',
    ]);

    // 3. Delete
    $deleteResponse = $this->delete("/admin/services/{$service->id}");
    $deleteResponse->assertRedirect(route('admin.services.index'));
    $this->assertDatabaseMissing('services', [
        'id' => $service->id,
    ]);
});

test('contact form stores message in database and admin can view it', function () {
    $response = $this->postJson('/contato', [
        'nome' => 'Cliente Teste',
        'email' => 'cliente@exemplo.com',
        'telefone' => '(51) 98888-7777',
        'area' => 'Ação Revisional',
        'mensagem' => 'Gostaria de saber como funciona a revisão de juros.',
    ]);

    $response->assertOk();
    $response->assertJson([
        'success' => true,
    ]);

    $this->assertDatabaseHas('contact_messages', [
        'name' => 'Cliente Teste',
        'email' => 'cliente@exemplo.com',
        'service' => 'Ação Revisional',
        'is_read' => false,
    ]);

    $message = ContactMessage::where('email', 'cliente@exemplo.com')->first();

    // Admin views message
    $admin = User::factory()->create();
    $this->actingAs($admin);

    $showResponse = $this->get("/admin/messages/{$message->id}");
    $showResponse->assertOk();
    $showResponse->assertSee('Cliente Teste');
    $showResponse->assertSee('Gostaria de saber como funciona a revisão de juros.');

    // Message is marked as read after viewing
    $this->assertTrue($message->fresh()->is_read);
});
