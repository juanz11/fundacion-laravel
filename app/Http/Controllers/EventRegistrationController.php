<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use App\Models\AdditionalParticipant;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    /**
     * Store a new event registration
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'id_number' => 'required|string|max:50',
                'phone' => 'required|string|max:20',
                'email' => 'nullable|email|max:255',
                'social_media' => 'nullable|string|max:255',
                'payment_reference' => 'nullable|string|max:255',
                'payment_method' => 'nullable|string|max:255',
                'payment_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'quantity' => 'required|integer|min:1|max:100',
                'total_amount' => 'required|numeric|min:20',
            ], [
                'id_number.required' => 'La cédula es obligatoria.',
                'full_name.required' => 'El nombre completo es obligatorio.',
                'phone.required' => 'El teléfono es obligatorio.',
                'email.email' => 'El correo electrónico debe ser válido.',
                'payment_proof.mimes' => 'El comprobante debe ser un archivo JPG, PNG o PDF.',
                'payment_proof.max' => 'El comprobante no debe superar los 5MB.',
                'quantity.required' => 'La cantidad de inscripciones es obligatoria.',
                'quantity.min' => 'Debe inscribir al menos 1 persona.',
                'total_amount.required' => 'El monto total es obligatorio.',
            ]);

            // Guardar el archivo de comprobante de pago
            $paymentProofPath = null;
            if ($request->hasFile('payment_proof')) {
                $file = $request->file('payment_proof');
                $filename = time() . '_' . $validated['id_number'] . '.' . $file->getClientOriginalExtension();
                $paymentProofPath = $file->storeAs('payment_proofs', $filename, 'public');
            }

            // Crear registro principal (primera persona)
            $registration = EventRegistration::create([
                'full_name' => $validated['full_name'],
                'id_number' => $validated['id_number'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'social_media' => $validated['social_media'],
                'payment_reference' => $validated['payment_reference'],
                'payment_method' => $validated['payment_method'] ?? null,
                'payment_proof' => $paymentProofPath,
                'quantity' => $validated['quantity'],
                'total_amount' => $validated['total_amount'],
                'status' => 'pending',
            ]);

            // Crear registros adicionales para las demás personas (si existen)
            if ($request->has('additional_people') && is_array($request->additional_people)) {
                foreach ($request->additional_people as $person) {
                    EventRegistration::create([
                        'full_name' => $person['name'],
                        'id_number' => $person['id_number'],
                        'phone' => $person['phone'],
                        'email' => $validated['email'], // Mismo email del titular
                        'social_media' => $validated['social_media'], // Misma red social del titular
                        'payment_reference' => $validated['payment_reference'], // Misma referencia
                        'payment_method' => $validated['payment_method'] ?? null, // Mismo método
                        'payment_proof' => $paymentProofPath, // Mismo comprobante
                        'quantity' => 1, // Cada registro individual es 1 persona
                        'total_amount' => 20.00, // $20 por persona
                        'status' => 'pending',
                    ]);
                }
            }

            // Si es una petición AJAX, devolver JSON
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => '¡Registro exitoso! Tu inscripción está pendiente de validación. Te contactaremos pronto.',
                    'registration' => $registration
                ]);
            }

            return back()->with('success', '¡Registro exitoso! Tu inscripción está pendiente de validación. Te contactaremos pronto.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson() || $request->ajax()) {
                $errors = $e->errors();
                $message = 'Por favor, verifica los siguientes campos: ';
                
                // Obtener el primer error
                if (!empty($errors)) {
                    $firstError = reset($errors);
                    $message = is_array($firstError) ? $firstError[0] : $firstError;
                }
                
                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'errors' => $errors
                ], 422);
            }
            throw $e;
        } catch (\Exception $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ocurrió un error al procesar tu registro: ' . $e->getMessage()
                ], 500);
            }
            return back()->with('error', 'Ocurrió un error al procesar tu registro. Por favor, intenta nuevamente.');
        }
    }

    /**
     * Admin: Get all event registrations
     */
    public function adminIndex()
    {
        $registrations = EventRegistration::with('approver')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'pending' => EventRegistration::pending()->count(),
            'approved' => EventRegistration::approved()->count(),
            'rejected' => EventRegistration::rejected()->count(),
            'total' => EventRegistration::count(),
        ];

        return view('admin.events.index', compact('registrations', 'stats'));
    }

    /**
     * Admin: Update registration status
     */
    public function updateStatus(Request $request, EventRegistration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $registration->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'] ?? null,
            'approved_at' => $validated['status'] === 'approved' ? now() : null,
            'approved_by' => $validated['status'] === 'approved' ? auth()->id() : null,
        ]);

        $statusText = $validated['status'] === 'approved' ? 'aprobado' : 'rechazado';
        return back()->with('success', "Registro {$statusText} exitosamente.");
    }

    /**
     * Admin: Delete a registration
     */
    public function destroy(EventRegistration $registration)
    {
        $registration->delete();
        return back()->with('success', 'Registro eliminado exitosamente.');
    }
}
