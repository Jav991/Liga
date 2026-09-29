@extends('layouts.app')

@section('title', 'Editar Equipo - ' . $equipo->Nombre)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/equipos/edit.css') }}">
@endsection

@section('content')
<div class="edit-container">
    <div class="card animate__animated animate__fadeIn">
        <h1>Editar Equipo</h1>
        
        <form action="{{ route('equipos.update', $equipo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Nombre del Equipo <span style="color: #EF4444">*</span></label>
                <input type="text" name="Nombre" value="{{ old('Nombre', $equipo->Nombre) }}" required>
                @error('Nombre') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Escudo del Equipo</label>
                
                @if($equipo->Logo)
                    <div class="current-logo-preview" style="margin-bottom: 1rem; display: flex; align-items: center; gap: 1rem;">
                        <img src="{{ asset('storage/' . $equipo->Logo) }}" style="width: 60px; height: 60px; object-fit: contain; border-radius: 8px; border: 2px solid #8b5cf6;">
                        <span style="color: #94a3b8; font-size: 0.9rem;">Escudo actual activo</span>
                    </div>
                @endif

                {{-- CAMBIO CLAVE: name="Logo" con mayúscula --}}
                <input type="file" name="Logo" accept="image/*" class="form-control">
                <small style="color: #64748b;">Opcional: Subir nuevo archivo para reemplazar el actual</small>
                @error('Logo') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="grid">
                <div class="form-group">
                    <label>Entrenador</label>
                    <input type="text" name="Entrenador" value="{{ old('Entrenador', $equipo->Entrenador) }}">
                </div>
                <div class="form-group">
                    <label>Presupuesto (€)</label>
                    <input type="number" step="0.01" name="Presupuesto" value="{{ old('Presupuesto', $equipo->Presupuesto) }}">
                </div>
            </div>

            <div class="grid">
                <div class="form-group">
                    <label>Puntos</label>
                    <input type="number" name="Puntos" value="{{ old('Puntos', $equipo->Puntos) }}">
                </div>
                <div class="form-group">
                    <label class="label-favor">Goles Favor</label>
                    <input type="number" name="Goles_Favor" value="{{ old('Goles_Favor', $equipo->Goles_Favor) }}">
                </div>
                <div class="form-group">
                    <label class="label-contra">Goles Contra</label>
                    <input type="number" name="Goles_Contra" value="{{ old('Goles_Contra', $equipo->Goles_Contra) }}">
                </div>
            </div>

            <div class="btn-group">
                <a href="{{ route('equipos.index') }}" class="btn btn-cancel">Cancelar</a>
                <button type="submit" class="btn btn-save"><i class="fas fa-sync-alt"></i> Actualizar Datos</button>
            </div>
        </form>
    </div>
</div>
@endsection