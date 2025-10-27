<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Store a new donation registration
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference_number' => 'required|string|max:255',
            'donor_name' => 'required|string|max:255',
            'donor_id_number' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ]);

        $donation = auth()->user()->donations()->create([
            'reference_number' => $validated['reference_number'],
            'donor_name' => $validated['donor_name'],
            'donor_id_number' => $validated['donor_id_number'],
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('user.donations')->with('success', 'Donación registrada exitosamente. Está pendiente de validación.');
    }

    /**
     * Admin: Get all donations for management
     */
    public function adminIndex()
    {
        $donations = Donation::with(['user', 'approver'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'pending' => Donation::pending()->count(),
            'approved' => Donation::approved()->count(),
            'rejected' => Donation::rejected()->count(),
            'total_amount' => Donation::approved()->sum('amount'),
        ];

        return view('admin.donations.index', compact('donations', 'stats'));
    }

    /**
     * Admin: Update donation status
     */
    public function updateStatus(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $donation->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'] ?? null,
            'approved_at' => $validated['status'] === 'approved' ? now() : null,
            'approved_by' => $validated['status'] === 'approved' ? auth()->id() : null,
        ]);

        $statusText = $validated['status'] === 'approved' ? 'aprobada' : 'rechazada';
        return back()->with('success', "Donación {$statusText} exitosamente.");
    }

    /**
     * Admin: Delete a donation
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return back()->with('success', 'Donación eliminada exitosamente.');
    }
}
