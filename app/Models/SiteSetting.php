<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteSetting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * URL pública da imagem do hero (banner).
     */
    public function getHeroImageUrlAttribute(): string
    {
        if ($this->hero_image) {
            if (Str::startsWith($this->hero_image, ['http://', 'https://'])) {
                return $this->hero_image;
            }

            if (Storage::disk('public')->exists($this->hero_image)) {
                return Storage::disk('public')->url($this->hero_image);
            }

            if (file_exists(public_path($this->hero_image))) {
                return asset($this->hero_image);
            }
        }

        return asset('img/banner-novo.png');
    }

    /**
     * URL pública do retrato do fundador (Marcelo).
     */
    public function getAboutFounderImageUrlAttribute(): string
    {
        if ($this->about_founder_image) {
            if (Str::startsWith($this->about_founder_image, ['http://', 'https://'])) {
                return $this->about_founder_image;
            }

            if (Storage::disk('public')->exists($this->about_founder_image)) {
                return Storage::disk('public')->url($this->about_founder_image);
            }

            if (file_exists(public_path($this->about_founder_image))) {
                return asset($this->about_founder_image);
            }
        }

        return asset('img/souza-foto.jpeg');
    }

    /**
     * Obter a instância única de configurações do site.
     */
    public static function current(): self
    {
        return static::first() ?? static::create([
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
        ]);
    }
}
