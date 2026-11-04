<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([
            ['name' => 'Marcelo Luiz Souza Pereira', 'slug' => 'marcelo-luiz-souza-pereira', 'oab_number' => 'OAB/RS 132.623', 'education' => 'Universidade Cruzeiro do Sul.', 'description' => 'Graduado pela Universidade Cruzeiro do Sul, com atuação voltada ao Direito Empresarial e ao assessoramento jurídico especializado. Possui experiência em Direito Bancário, gestão de passivos bancários, ações revisionais e defesa dos direitos dos consumidores, especialmente em processos de busca e apreensão de veículos.', 'specialties' => ['Direito Empresarial', 'Direito Bancário', 'Direito do Consumidor'], 'photo' => 'images/equipes/marcelo-souza-pereira.png', 'sort_order' => 1],
            ['name' => 'Juliano Michielin Rodrigues', 'slug' => 'juliano-michielin-rodrigues', 'oab_number' => 'OAB/RS 140.764', 'education' => 'Pontifícia Universidade Católica (PUC). Pós-graduando em Direito de Família e Sucessões pela Fundação Escola Superior do Ministério Público.', 'description' => 'Graduado pela Pontifícia Universidade Católica (PUC) e pós-graduando em Direito de Família e Sucessões pela Fundação Escola Superior do Ministério Público. Atua nas áreas de Direito de Família, Inventários, Direito Imobiliário e Usucapião.', 'specialties' => ['Direito de Família e Sucessões', 'Inventários', 'Direito Imobiliário e Usucapião'], 'photo' => 'images/equipes/juliano-michielin-rodrigue.png', 'sort_order' => 2],
            ['name' => 'Lourdes Boeira Batista', 'slug' => 'lourdes-boeira-batista', 'oab_number' => 'OAB/RS 53.085', 'education' => 'Universidade Luterana do Brasil (ULBRA).', 'description' => 'Graduada pela Universidade Luterana do Brasil (ULBRA), possui ampla experiência em Direito Previdenciário e Direito do Trabalho, com atuação destacada em questões relacionadas à Seguridade Social, benefícios previdenciários e relações trabalhistas.', 'specialties' => ['Direito Previdenciário', 'Direito do Trabalho', 'Seguridade Social'], 'photo' => 'images/equipes/lourdes-boeira-batista.png', 'sort_order' => 3],
        ] as $member) {
            TeamMember::firstOrCreate(['slug' => $member['slug']], $member + ['is_active' => true]);
        }
    }
}
