<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Exibe o formulário de edição de configurações institucionais.
     */
    public function edit(): View
    {
        $settings = SiteSetting::current();

        return view('admin.settings.edit', compact('settings'));
    }

    /**
     * Atualiza as configurações no banco de dados.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_title' => ['required', 'string', 'max:255'],
            'site_subtitle' => ['required', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'location_badge' => ['required', 'string', 'max:255'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_subtitle' => ['required', 'string'],
            'metric_1_number' => ['required', 'string', 'max:50'],
            'metric_1_label' => ['required', 'string', 'max:100'],
            'metric_2_number' => ['required', 'string', 'max:50'],
            'metric_2_label' => ['required', 'string', 'max:100'],
            'metric_3_number' => ['required', 'string', 'max:50'],
            'metric_3_label' => ['required', 'string', 'max:100'],
            'about_founder_name' => ['required', 'string', 'max:255'],
            'about_founder_title' => ['required', 'string', 'max:255'],
            'about_founder_oab' => ['required', 'string', 'max:255'],
            'about_text_1' => ['required', 'string'],
            'about_text_2' => ['required', 'string'],
            'about_quote' => ['nullable', 'string'],
            'about_quote_author' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'whatsapp_url' => ['required', 'url', 'max:500'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:500'],
        ]);

        $settings = SiteSetting::current();
        $settings->update($validated);

        return redirect()->route('admin.settings.edit')
            ->with('success', 'Configurações institucionais atualizadas com sucesso!');
    }
}
