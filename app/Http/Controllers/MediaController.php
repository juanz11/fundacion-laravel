<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::with('user')->latest();

        // Filtrar por tipo si se especifica
        if ($request->has('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        // Búsqueda
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('original_name', 'like', '%' . $request->search . '%');
            });
        }

        $media = $query->paginate(20);

        return view('admin.media.index', compact('media'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|max:10240', // 10MB max
            'description' => 'nullable|string|max:500',
        ]);

        $uploadedFiles = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = $file->getClientOriginalName();
                $fileName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('media', $fileName, 'public');

                $media = Media::create([
                    'user_id' => auth()->id(),
                    'name' => pathinfo($originalName, PATHINFO_FILENAME),
                    'original_name' => $originalName,
                    'file_path' => $filePath,
                    'mime_type' => $file->getMimeType(),
                    'type' => Media::determineType($file->getMimeType()),
                    'size' => $file->getSize(),
                    'description' => $request->description,
                ]);

                $uploadedFiles[] = $media;
            }
        }

        return back()->with('success', count($uploadedFiles) . ' archivo(s) subido(s) exitosamente.');
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $media->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Archivo actualizado correctamente.');
    }

    public function destroy(Media $media)
    {
        // Eliminar el archivo físico
        if (Storage::disk('public')->exists($media->file_path)) {
            Storage::disk('public')->delete($media->file_path);
        }

        // Eliminar el registro de la base de datos
        $media->delete();

        return back()->with('success', 'Archivo eliminado correctamente.');
    }

    public function download(Media $media)
    {
        if (!Storage::disk('public')->exists($media->file_path)) {
            abort(404, 'Archivo no encontrado');
        }

        return Storage::disk('public')->download($media->file_path, $media->original_name);
    }
}
