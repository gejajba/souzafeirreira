<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Lista mensagens de contato recebidas pelo site.
     */
    public function index(Request $request): View
    {
        $query = ContactMessage::query();

        if ($request->has('unread')) {
            $query->unread();
        }

        $messages = $query->recent()->paginate(15);
        $unreadCount = ContactMessage::unread()->count();

        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    /**
     * Exibe os detalhes de uma mensagem e marca como lida.
     */
    public function show(ContactMessage $message): View
    {
        if (! $message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Alterna status de lida/não lida.
     */
    public function toggleRead(ContactMessage $message): RedirectResponse
    {
        $message->update(['is_read' => ! $message->is_read]);

        return back()->with('success', 'Status da mensagem atualizado com sucesso.');
    }

    /**
     * Exclui mensagem.
     */
    public function destroy(ContactMessage $message): RedirectResponse
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Mensagem removida com sucesso!');
    }
}
