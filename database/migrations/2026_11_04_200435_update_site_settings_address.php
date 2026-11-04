<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('site_settings')->update([
            'address' => 'Av. Alexandrino de Alencar, 949, Sala 01, Bairro Morada do Vale I, Gravataí/RS, CEP: 94085-120',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('site_settings')->update([
            'address' => 'Rua Ary Tubbs 569 sala 303 Centro – Gravataí/RS Cep 94.010-180',
        ]);
    }
};
