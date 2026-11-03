<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Gera o sitemap.xml do site de forma dinâmica para indexação nos motores de busca (Google, Bing).
     */
    public function index(): Response
    {
        $articles = Article::active()->ordered()->get();

        $content = view('sitemap', compact('articles'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
        ]);
    }
}
