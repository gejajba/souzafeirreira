<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Tratamento preventivo para arquivos que ultrapassam limites do PHP
        if (isset($_FILES['about_founder_image']) && $_FILES['about_founder_image']['error'] === UPLOAD_ERR_INI_SIZE) {
            return back()->withInput()->withErrors([
                'about_founder_image' => 'A foto do Dr. Marcelo ultrapassou o limite de upload do servidor (máximo 2MB). A imagem será comprimida automaticamente se você selecioná-la novamente ou utilize uma imagem de até 2MB.',
            ]);
        }

        if (isset($_FILES['hero_image']) && $_FILES['hero_image']['error'] === UPLOAD_ERR_INI_SIZE) {
            return back()->withInput()->withErrors([
                'hero_image' => 'A imagem de destaque do hero ultrapassou o limite de upload do servidor (máximo 2MB). A imagem será comprimida automaticamente se você selecioná-la novamente ou utilize uma imagem de até 2MB.',
            ]);
        }

        $messages = [
            'about_founder_image.uploaded' => 'A foto do Dr. Marcelo não pôde ser enviada porque excede o limite do servidor (máximo 2MB). Por favor, envie uma imagem de até 2MB ou utilize a otimização automática.',
            'about_founder_image.image' => 'A foto do Dr. Marcelo deve ser um arquivo de imagem válido (JPG, PNG ou WEBP).',
            'about_founder_image.mimes' => 'A foto do Dr. Marcelo deve estar no formato JPG, PNG ou WEBP.',
            'about_founder_image.max' => 'A foto do Dr. Marcelo não pode ser maior que 2MB.',
            'hero_image.uploaded' => 'A imagem de destaque do hero não pôde ser enviada porque excede o limite do servidor (máximo 2MB). Por favor, envie uma imagem de até 2MB ou utilize a otimização automática.',
            'hero_image.image' => 'O banner do hero deve ser um arquivo de imagem válido (JPG, PNG ou WEBP).',
            'hero_image.mimes' => 'O banner do hero deve estar no formato JPG, PNG ou WEBP.',
            'hero_image.max' => 'O banner do hero não pode ser maior que 2MB.',
        ];

        $validated = $request->validate([
            'site_title' => ['required', 'string', 'max:255'],
            'site_subtitle' => ['required', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'location_badge' => ['required', 'string', 'max:255'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_subtitle' => ['required', 'string'],
            'hero_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'remove_hero_image' => ['nullable', 'boolean'],
            'metric_1_number' => ['required', 'string', 'max:50'],
            'metric_1_label' => ['required', 'string', 'max:100'],
            'metric_2_number' => ['required', 'string', 'max:50'],
            'metric_2_label' => ['required', 'string', 'max:100'],
            'metric_3_number' => ['required', 'string', 'max:50'],
            'metric_3_label' => ['required', 'string', 'max:100'],
            'about_founder_name' => ['required', 'string', 'max:255'],
            'about_founder_title' => ['required', 'string', 'max:255'],
            'about_founder_oab' => ['required', 'string', 'max:255'],
            'about_founder_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'remove_about_founder_image' => ['nullable', 'boolean'],
            'about_text_1' => ['required', 'string'],
            'about_text_2' => ['required', 'string'],
            'about_quote' => ['nullable', 'string'],
            'about_quote_author' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'whatsapp_url' => ['required', 'url', 'max:500'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:500'],
        ], $messages);

        $settings = SiteSetting::current();

        // Processamento da Imagem do Hero
        if ($request->hasFile('hero_image')) {
            if ($settings->hero_image && Storage::disk('public')->exists($settings->hero_image)) {
                Storage::disk('public')->delete($settings->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('settings', 'public');
        } elseif ($request->boolean('remove_hero_image')) {
            if ($settings->hero_image && Storage::disk('public')->exists($settings->hero_image)) {
                Storage::disk('public')->delete($settings->hero_image);
            }
            $validated['hero_image'] = null;
        } else {
            unset($validated['hero_image']);
        }

        // Processamento do Retrato de Marcelo (Sobre Nós)
        if ($request->hasFile('about_founder_image')) {
            if ($settings->about_founder_image && Storage::disk('public')->exists($settings->about_founder_image)) {
                Storage::disk('public')->delete($settings->about_founder_image);
            }
            $validated['about_founder_image'] = $request->file('about_founder_image')->store('settings', 'public');
        } elseif ($request->boolean('remove_about_founder_image')) {
            if ($settings->about_founder_image && Storage::disk('public')->exists($settings->about_founder_image)) {
                Storage::disk('public')->delete($settings->about_founder_image);
            }
            $validated['about_founder_image'] = null;
        } else {
            unset($validated['about_founder_image']);
        }

        unset($validated['remove_hero_image'], $validated['remove_about_founder_image']);

        $settings->update($validated);

        return redirect()->route('admin.settings.edit')
            ->with('success', 'Configurações institucionais e imagens atualizadas com sucesso!');
    }
}
