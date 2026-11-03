<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Salva mensagem de contato enviada pelo formulário do site.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telefone' => ['nullable', 'string', 'max:50'],
            'area' => ['nullable', 'string', 'max:100'],
            'mensagem' => ['required', 'string', 'max:5000'],
        ]);

        $message = ContactMessage::create([
            'name' => $validated['nome'],
            'email' => $validated['email'],
            'phone' => $validated['telefone'] ?? null,
            'service' => $validated['area'] ?? null,
            'message' => $validated['mensagem'],
            'is_read' => false,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Sua mensagem foi enviada com sucesso ao Souza Pereira Advocacia. Entraremos em contato em breve!',
            ]);
        }

        return back()->with('success', 'Sua mensagem foi enviada com sucesso ao Souza Pereira Advocacia. Entraremos em contato em breve!');
    }
}
