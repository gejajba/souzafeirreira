<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Pillar;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Exibe a página principal com dados carregados do banco de dados.
     */
    public function index(): View
    {
        $settings = SiteSetting::current();
        $services = Service::active()->ordered()->get();
        $pillars = Pillar::active()->ordered()->get();
        $articles = Article::active()->ordered()->get();

        return view('welcome', compact('settings', 'services', 'pillars', 'articles'));
    }

    /**
     * Exibe a página institucional de Política de Privacidade e Proteção de Dados (LGPD).
     */
    public function lgpd(): View
    {
        $settings = SiteSetting::current();

        return view('lgpd', compact('settings'));
    }
}
