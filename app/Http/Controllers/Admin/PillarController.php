<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pillar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PillarController extends Controller
{
    /**
     * Lista pilares de conduta.
     */
    public function index(): View
    {
        $pillars = Pillar::ordered()->get();

        return view('admin.pillars.index', compact('pillars'));
    }

    /**
     * Formulário de cadastro.
     */
    public function create(): View
    {
        return view('admin.pillars.create');
    }

    /**
     * Grava novo pilar.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'order' => ['required', 'integer', 'min:0'],
            'number' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tag' => ['nullable', 'string', 'max:100'],
            'icon' => ['required', 'string', 'max:100'],
            'active' => ['boolean'],
        ]);

        $validated['active'] = $request->boolean('active');

        Pillar::create($validated);

        return redirect()->route('admin.pillars.index')
            ->with('success', 'Pilar cadastrado com sucesso!');
    }

    /**
     * Edição de pilar.
     */
    public function edit(Pillar $pillar): View
    {
        return view('admin.pillars.edit', compact('pillar'));
    }

    /**
     * Atualiza pilar.
     */
    public function update(Request $request, Pillar $pillar): RedirectResponse
    {
        $validated = $request->validate([
            'order' => ['required', 'integer', 'min:0'],
            'number' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tag' => ['nullable', 'string', 'max:100'],
            'icon' => ['required', 'string', 'max:100'],
            'active' => ['boolean'],
        ]);

        $validated['active'] = $request->boolean('active');

        $pillar->update($validated);

        return redirect()->route('admin.pillars.index')
            ->with('success', 'Pilar atualizado com sucesso!');
    }

    /**
     * Exclui pilar.
     */
    public function destroy(Pillar $pillar): RedirectResponse
    {
        $pillar->delete();

        return redirect()->route('admin.pillars.index')
            ->with('success', 'Pilar removido com sucesso!');
    }
}
