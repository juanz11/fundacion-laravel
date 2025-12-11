@extends('layouts.admin')

@section('title', 'Encuesta Profesionales')
@section('page-title', 'Encuesta Profesionales')

@section('content')
<div class="card">
    <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
        <h2>Respuestas de la Encuesta</h2>
        @if(!$surveys->isEmpty())
            <a href="{{ route('admin.surveys.export') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-file-excel"></i> Exportar a Excel
            </a>
        @endif
    </div>
    <div class="table-container">
        @if($surveys->isEmpty())
            <p>No hay respuestas registradas.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre completo</th>
                        <th>Cédula</th>
                        <th>Dirección</th>
                        <th>N° Colegiatura</th>
                        <th>Dónde pasa consulta</th>
                        <th>Edad</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Especialidad</th>
                        <th>Género</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveys as $survey)
                        <tr>
                            <td>{{ $survey->id }}</td>
                            <td>{{ $survey->nombre_completo }}</td>
                            <td>{{ $survey->cedula }}</td>
                            <td>{{ $survey->direccion }}</td>
                            <td>{{ $survey->numero_colegiatura }}</td>
                            <td>{{ $survey->lugar_consulta }}</td>
                            <td>{{ $survey->edad }}</td>
                            <td>{{ $survey->email }}</td>
                            <td>{{ $survey->telefono }}</td>
                            <td>{{ $survey->especialidad }}</td>
                            <td>{{ ucfirst($survey->genero) }}</td>
                            <td>{{ $survey->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $surveys->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
