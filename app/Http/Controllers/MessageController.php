<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Mostrar formulario de contacto (requiere autenticación)
     */
    public function create()
    {
        return view('contacto');
    }

    /**
     * Guardar mensaje enviado por el usuario
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'phone' => 'nullable|string|max:20',
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'phone' => $validated['phone'],
            'status' => 'nuevo',
        ]);

        return back()->with('success', '¡Mensaje enviado exitosamente! Nos pondremos en contacto contigo pronto.');
    }

    /**
     * Listar todos los mensajes (solo admin)
     */
    public function index(Request $request)
    {
        $query = Message::with('user')->latest();

        // Filtrar por estado
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Búsqueda
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('subject', 'like', '%' . $request->search . '%')
                  ->orWhere('message', 'like', '%' . $request->search . '%')
                  ->orWhereHas('user', function($userQuery) use ($request) {
                      $userQuery->where('name', 'like', '%' . $request->search . '%')
                                ->orWhere('email', 'like', '%' . $request->search . '%');
                  });
            });
        }

        $messages = $query->paginate(20);

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Ver detalle de un mensaje
     */
    public function show(Message $message)
    {
        // Marcar como leído si es nuevo
        if ($message->isNew()) {
            $message->markAsRead();
        }

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Actualizar estado del mensaje
     */
    public function updateStatus(Request $request, Message $message)
    {
        $request->validate([
            'status' => 'required|in:nuevo,leido,respondido',
        ]);

        $message->update(['status' => $request->status]);

        if ($request->status === 'leido' && !$message->read_at) {
            $message->update(['read_at' => now()]);
        }

        return back()->with('success', 'Estado actualizado correctamente.');
    }

    /**
     * Eliminar mensaje
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('success', 'Mensaje eliminado correctamente.');
    }
}
