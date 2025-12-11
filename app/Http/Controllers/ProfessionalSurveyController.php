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

        return redirect()
            ->route('professional-survey.form')
            ->with('success', '¡Listo! Hemos recibido tus datos. Nuestro equipo se comunicará contigo en la brevedad posible.');
    }

    public function adminIndex()
    {
        $surveys = ProfessionalSurvey::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.surveys.index', compact('surveys'));
    }
    
    public function export()
    {
        $fileName = 'encuesta_profesionales_'.now()->format('Ymd_His').'.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');

            // BOM para que Excel reconozca UTF-8 correctamente
            fprintf($handle, "\xEF\xBB\xBF");

            // Encabezados de columna
            fputcsv($handle, [
                'ID',
                'Nombre completo',
                'Cédula',
                'Dirección',
                'Número de colegiatura',
                'Dónde pasa consulta',
                'Edad',
                'Email',
                'Teléfono',
                'Especialidad',
                'Género',
                'Fecha de creación',
            ], ';');

            ProfessionalSurvey::orderBy('created_at', 'desc')->chunk(200, function ($surveys) use ($handle) {
                foreach ($surveys as $survey) {
                    fputcsv($handle, [
                        $survey->id,
                        $survey->nombre_completo,
                        $survey->cedula,
                        $survey->direccion,
                        $survey->numero_colegiatura,
                        $survey->lugar_consulta,
                        $survey->edad,
                        $survey->email,
                        $survey->telefono,
                        $survey->especialidad,
                        $survey->genero,
                        optional($survey->created_at)->format('Y-m-d H:i:s'),
                    ], ';');
                }
            });

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
