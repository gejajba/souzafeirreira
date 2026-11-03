<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Lista pública de artigos e publicações jurídicas.
     */
    public function index(Request $request): View
    {
        $settings = SiteSetting::current();
        $query = Article::active()->ordered();

        if ($category = $request->get('categoria')) {
            $query->where('category', $category);
        }

        $articles = $query->paginate(9)->withQueryString();
        $categories = Article::active()->pluck('category')->unique()->values();

        return view('articles.index', compact('settings', 'articles', 'categories'));
    }

    /**
     * Exibe a página de detalhe/leitura de um artigo específico.
     */
    public function show(Article $article): View
    {
        abort_unless($article->active, 404);

        $settings = SiteSetting::current();

        $relatedArticles = Article::active()
            ->where('id', '!=', $article->id)
            ->where(function ($q) use ($article) {
                $q->where('category', $article->category)
                    ->orWhere('id', '>', 0);
            })
            ->take(3)
            ->get();

        return view('articles.show', compact('settings', 'article', 'relatedArticles'));
    }
}
