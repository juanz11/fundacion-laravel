<?php

namespace App\Http\Controllers;

use App\Models\ProfessionalSurvey;
use Illuminate\Http\Request;

class ProfessionalSurveyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'cedula' => 'required|string|max:100',
            'direccion' => 'required|string|max:500',
            'numero_colegiatura' => 'required|string|max:255',
            'lugar_consulta' => 'required|string|max:255',
            'edad' => 'required|integer|min:18|max:120',
            'email' => 'required|email|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'genero' => 'required|in:femenino,masculino',
        ]);

        ProfessionalSurvey::create($validated);

        return back()->with('success', 'Formulario enviado correctamente.');
    }

    public function adminIndex()
    {
        $surveys = ProfessionalSurvey::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.surveys.index', compact('surveys'));
    }
}
