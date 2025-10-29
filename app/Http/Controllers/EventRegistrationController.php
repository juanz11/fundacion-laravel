<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
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
            ], [
                'id_number.required' => 'La cédula es obligatoria.',
                'full_name.required' => 'El nombre completo es obligatorio.',
                'phone.required' => 'El teléfono es obligatorio.',
                'email.email' => 'El correo electrónico debe ser válido.',
                'payment_proof.mimes' => 'El comprobante debe ser un archivo JPG, PNG o PDF.',
                'payment_proof.max' => 'El comprobante no debe superar los 5MB.',
            ]);

            // Guardar el archivo de comprobante de pago
            $paymentProofPath = null;
            if ($request->hasFile('payment_proof')) {
                $file = $request->file('payment_proof');
                $filename = time() . '_' . $validated['id_number'] . '.' . $file->getClientOriginalExtension();
                $paymentProofPath = $file->storeAs('payment_proofs', $filename, 'public');
            }

            $registration = EventRegistration::create([
                'full_name' => $validated['full_name'],
                'id_number' => $validated['id_number'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'social_media' => $validated['social_media'],
                'payment_reference' => $validated['payment_reference'],
                'payment_method' => $validated['payment_method'] ?? null,
                'payment_proof' => $paymentProofPath,
                'status' => 'pending',
            ]);

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
