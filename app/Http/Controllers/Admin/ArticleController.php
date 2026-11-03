<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Lista artigos e análises.
     */
    public function index(): View
    {
        $articles = Article::ordered()->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Formulário de cadastro.
     */
    public function create(): View
    {
        return view('admin.articles.create');
    }

    /**
     * Grava novo artigo.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'order' => ['required', 'integer', 'min:0'],
            'category' => ['required', 'string', 'max:100'],
            'tag' => ['nullable', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:articles,slug'],
            'summary' => ['required', 'string'],
            'content' => ['nullable', 'string'],
            'active' => ['boolean'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['active'] = $request->boolean('active');
        $validated['published_at'] = $validated['active'] ? now() : null;

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artigo cadastrado com sucesso!');
    }

    /**
     * Formulário de edição.
     */
    public function edit(Article $article): View
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Atualiza artigo.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'order' => ['required', 'integer', 'min:0'],
            'category' => ['required', 'string', 'max:100'],
            'tag' => ['nullable', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('articles')->ignore($article->id)],
            'summary' => ['required', 'string'],
            'content' => ['nullable', 'string'],
            'active' => ['boolean'],
        ]);

        $validated['active'] = $request->boolean('active');

        if ($validated['active'] && ! $article->published_at) {
            $validated['published_at'] = now();
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artigo atualizado com sucesso!');
    }

    /**
     * Exclui artigo.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artigo removido com sucesso!');
    }
}
