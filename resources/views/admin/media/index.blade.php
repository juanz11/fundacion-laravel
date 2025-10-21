@extends('layouts.admin')

@section('title', 'Gestión de Medios')
@section('page-title', 'Gestión de Medios')

@section('styles')
<style>
    .upload-area {
        border: 3px dashed #ccc;
        border-radius: 10px;
        padding: 3rem;
        text-align: center;
        background: #fafafa;
        cursor: pointer;
        transition: all 0.3s;
        margin-bottom: 2rem;
    }

    .upload-area:hover {
        border-color: var(--primary-color);
        background: #f0f7ff;
    }

    .upload-area.dragover {
        border-color: var(--primary-color);
        background: #e3f2fd;
    }

    .upload-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .filters {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 0.5rem 1rem;
        border: 2px solid #e0e0e0;
        background: white;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .filter-btn:hover,
    .filter-btn.active {
        border-color: var(--primary-color);
        background: var(--primary-color);
        color: white;
    }

    .search-box {
        flex: 1;
        min-width: 250px;
    }

    .search-box input {
        width: 100%;
        padding: 0.5rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 5px;
    }

    .media-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .media-item {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }

    .media-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .media-preview {
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f5f5f5;
        overflow: hidden;
    }

    .media-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .media-preview .file-icon {
        font-size: 4rem;
        color: var(--primary-color);
    }

    .media-info {
        padding: 1rem;
    }

    .media-name {
        font-weight: 600;
        margin-bottom: 0.5rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .media-meta {
        font-size: 0.85rem;
        color: var(--text-light);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .media-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }

    .media-actions button,
    .media-actions a {
        flex: 1;
        padding: 0.4rem;
        font-size: 0.85rem;
        text-align: center;
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        max-width: 600px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: var(--text-light);
    }

    .preview-large {
        width: 100%;
        max-height: 400px;
        object-fit: contain;
        margin-bottom: 1rem;
        border-radius: 5px;
    }
</style>
@endsection

@section('content')
<!-- Upload Area -->
<div class="card">
    <div class="card-header">
        <h2>Subir Archivos</h2>
    </div>
    
    <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
        @csrf
        <div class="upload-area" id="uploadArea">
            <div class="upload-icon">
                <i class="fas fa-cloud-upload-alt"></i>
            </div>
            <h3>Arrastra archivos aquí o haz clic para seleccionar</h3>
            <p>Máximo 10MB por archivo. Soporta imágenes, documentos, videos y audio.</p>
            <input type="file" name="files[]" id="fileInput" multiple style="display: none;" accept="image/*,video/*,audio/*,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt">
        </div>

        <div class="form-group">
            <label for="description">Descripción (opcional)</label>
            <textarea name="description" id="description" rows="3" style="width: 100%; padding: 0.5rem; border: 1px solid #e0e0e0; border-radius: 5px;"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="uploadBtn" style="display: none;">
            <i class="fas fa-upload"></i> Subir Archivos
        </button>
    </form>
</div>

<!-- Filters -->
<div class="card">
    <form method="GET" action="{{ route('admin.media.index') }}">
        <div class="filters">
            <button type="submit" name="type" value="all" class="filter-btn {{ request('type', 'all') === 'all' ? 'active' : '' }}">
                <i class="fas fa-th"></i> Todos
            </button>
            <button type="submit" name="type" value="image" class="filter-btn {{ request('type') === 'image' ? 'active' : '' }}">
                <i class="fas fa-image"></i> Imágenes
            </button>
            <button type="submit" name="type" value="document" class="filter-btn {{ request('type') === 'document' ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i> Documentos
            </button>
            <button type="submit" name="type" value="video" class="filter-btn {{ request('type') === 'video' ? 'active' : '' }}">
                <i class="fas fa-video"></i> Videos
            </button>
            <button type="submit" name="type" value="audio" class="filter-btn {{ request('type') === 'audio' ? 'active' : '' }}">
                <i class="fas fa-music"></i> Audio
            </button>
            
            <div class="search-box">
                <input type="text" name="search" placeholder="Buscar archivos..." value="{{ request('search') }}">
            </div>
        </div>
    </form>
</div>

<!-- Media Grid -->
<div class="card">
    <div class="card-header">
        <h2>Archivos ({{ $media->total() }})</h2>
    </div>

    @if($media->count() > 0)
        <div class="media-grid">
            @foreach($media as $item)
            <div class="media-item" onclick="openModal({{ $item->id }})">
                <div class="media-preview">
                    @if($item->type === 'image')
                        <img src="{{ asset('storage/' . $item->file_path) }}" alt="{{ $item->name }}">
                    @else
                        <div class="file-icon">
                            <i class="fas {{ $item->icon }}"></i>
                        </div>
                    @endif
                </div>
                <div class="media-info">
                    <div class="media-name" title="{{ $item->name }}">{{ $item->name }}</div>
                    <div class="media-meta">
                        <span class="badge badge-{{ $item->type === 'image' ? 'admin' : 'user' }}">{{ ucfirst($item->type) }}</span>
                        <span>{{ $item->formatted_size }}</span>
                    </div>
                    <div class="media-actions" onclick="event.stopPropagation()">
                        <a href="{{ route('admin.media.download', $item) }}" class="btn btn-primary btn-sm" title="Descargar">
                            <i class="fas fa-download"></i>
                        </a>
                        <button onclick="editMedia({{ $item->id }})" class="btn btn-primary btn-sm" title="Editar">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form method="POST" action="{{ route('admin.media.destroy', $item) }}" style="display: inline;" onsubmit="return confirm('¿Eliminar este archivo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div style="margin-top: 2rem;">
            {{ $media->links() }}
        </div>
    @else
        <p style="text-align: center; padding: 3rem; color: var(--text-light);">
            <i class="fas fa-folder-open" style="font-size: 3rem; display: block; margin-bottom: 1rem;"></i>
            No hay archivos. ¡Sube tu primer archivo!
        </p>
    @endif
</div>

<!-- Modal para ver detalles -->
<div class="modal" id="mediaModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Detalles del Archivo</h2>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>
        <div id="modalBody"></div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Upload area drag and drop
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const uploadBtn = document.getElementById('uploadBtn');

    uploadArea.addEventListener('click', () => fileInput.click());

    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        fileInput.files = e.dataTransfer.files;
        updateUploadButton();
    });

    fileInput.addEventListener('change', updateUploadButton);

    function updateUploadButton() {
        if (fileInput.files.length > 0) {
            uploadBtn.style.display = 'block';
            uploadArea.querySelector('h3').textContent = `${fileInput.files.length} archivo(s) seleccionado(s)`;
        }
    }

    // Modal functions
    function openModal(id) {
        // Aquí podrías cargar los detalles via AJAX
        document.getElementById('mediaModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('mediaModal').classList.remove('active');
    }

    function editMedia(id) {
        alert('Función de edición - ID: ' + id);
    }

    // Cerrar modal al hacer clic fuera
    document.getElementById('mediaModal').addEventListener('click', (e) => {
        if (e.target.id === 'mediaModal') {
            closeModal();
        }
    });
</script>
@endsection
