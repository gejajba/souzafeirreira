<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Lista todos os serviços/áreas de atuação.
     */
    public function index(): View
    {
        $services = Service::ordered()->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Exibe o formulário de cadastro de novo serviço.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Grava novo serviço no banco de dados.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:services,slug'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'order' => ['required', 'integer', 'min:0'],
            'short_description' => ['required', 'string'],
            'full_description' => ['required', 'string'],
            'active' => ['boolean'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['active'] = $request->boolean('active');

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Serviço cadastrado com sucesso!');
    }

    /**
     * Exibe formulário de edição de serviço.
     */
    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Atualiza serviço existente.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('services')->ignore($service->id)],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'order' => ['required', 'integer', 'min:0'],
            'short_description' => ['required', 'string'],
            'full_description' => ['required', 'string'],
            'active' => ['boolean'],
        ]);

        $validated['active'] = $request->boolean('active');

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Serviço atualizado com sucesso!');
    }

    /**
     * Remove serviço.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Serviço removido com sucesso!');
    }
}
