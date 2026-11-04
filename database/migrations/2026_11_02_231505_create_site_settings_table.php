<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->default('Souza Pereira Advocacia');
            $table->string('site_subtitle')->default('Advocacia Estratégica');
            $table->text('meta_description')->nullable();

            // Hero
            $table->string('location_badge')->default('Gravataí • Rio Grande do Sul');
            $table->string('hero_title')->default('Compromisso jurídico. Atuação próxima e responsável.');
            $table->text('hero_subtitle');
            $table->string('metric_1_number')->default('2020');
            $table->string('metric_1_label')->default('Fundação em Gravataí');
            $table->string('metric_2_number')->default('100%');
            $table->string('metric_2_label')->default('Atendimento Direto');
            $table->string('metric_3_number')->default('RS & BR');
            $table->string('metric_3_label')->default('Atuação Abrangente');

            // Sobre Nós / Fundador
            $table->string('about_founder_name')->default('Marcelo Luiz S. Pereira');
            $table->string('about_founder_title')->default('Advogado Fundador & Responsável Técnico');
            $table->string('about_founder_oab')->default('Inscrição na OAB Rio Grande do Sul');
            $table->text('about_text_1');
            $table->text('about_text_2');
            $table->text('about_quote')->nullable();
            $table->string('about_quote_author')->nullable();

            // Contato e Localização
            $table->string('phone')->default('(51) 99920-1927');
            $table->string('whatsapp_url')->default('https://api.whatsapp.com/send/?phone=5551999201927&text&type=phone_number&app_absent=0');
            $table->string('email')->default('contato@souzapereira.com');
            $table->string('address')->default('Av. Alexandrino de Alencar, 949, Sala 01, Bairro Morada do Vale I, Gravataí/RS, CEP: 94085-120');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
