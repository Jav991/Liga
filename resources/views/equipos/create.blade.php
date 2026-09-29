@extends('layouts.app')

@section('title', 'Formulario de Equipo')

@section('title-section', 'Crear Equipo')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/equipos/create.css') }}">
@endsection

@section('content')
<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h1><i class="fas fa-futbol"></i> Formulario de Equipo</h1>
        </div>

        <div class="form-body">
           {{-- Enctype para archivos habilitado --}}
           <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="nombre">Nombre <span class="required">*</span></label>
                    <input type="text" id="nombre" name="Nombre" value="{{ old('Nombre') }}" required placeholder="Ej: Real Madrid">
                    @error('Nombre') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="Logo">Escudo Oficial (Opcional)</label>
                    {{-- CAMBIO CLAVE: name="Logo" con mayúscula --}}
                    <input type="file" id="Logo" name="Logo" accept="image/*" class="form-control">
                    @error('Logo') <div class="error-message" style="color: #f87171;">{{ $message }}</div> @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="puntos">Puntos <span class="required">*</span></label>
                        <input type="number" id="puntos" name="Puntos" value="{{ old('Puntos', 0) }}" required min="0">
                    </div>

                    <div class="form-group">
                        <label for="favor">Goles Favor <span class="required">*</span></label>
                        <input type="number" id="favor" name="Goles_Favor" value="{{ old('Goles_Favor', 0) }}" required min="0">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contra">Goles Contra <span class="required">*</span></label>
                        <input type="number" id="contra" name="Goles_Contra" value="{{ old('Goles_Contra', 0) }}" required min="0">
                    </div>

                    <div class="form-group">
                        <label for="presupuesto">Presupuesto (€) <span class="required">*</span></label>
                        <input type="number" step="0.01" id="presupuesto" name="Presupuesto" value="{{ old('Presupuesto') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="entrenador">Entrenador <span class="required">*</span></label>
                    <input type="text" id="entrenador" name="Entrenador" value="{{ old('Entrenador') }}" required>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Guardar</button>
                    <a href="{{ route('equipos.index') }}" class="btn-cancel"><i class="fas fa-times"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection