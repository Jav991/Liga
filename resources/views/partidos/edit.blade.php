@extends('layouts.app')

@section('title', 'Editar Partido')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/partidos/edit.css') }}">
@endsection

@section('title-section', 'Editar Partido')

@section('content')
<div class="edit-container">
    <div class="card">
        <h1><i class="fas fa-edit"></i> Editar Partido #{{ $partido->id }}</h1>
        
        <form action="{{ route('partidos.update', $partido->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Equipo Local -->
            <div class="form-group">
                <label for="equipo_local_id">
                    <i class="fas fa-home"></i>
                    Equipo Local
                    <span class="required">*</span>
                </label>
                <select name="equipo_local_id" id="equipo_local_id" class="form-control" required>
                    <option value="">Selecciona el equipo local</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" 
                            {{ old('equipo_local_id', $partido->equipo_local_id) == $equipo->id ? 'selected' : '' }}>
                            {{ $equipo->Nombre }}
                        </option>
                    @endforeach
                </select>
                @error('equipo_local_id')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Equipo Visitante -->
            <div class="form-group">
                <label for="equipo_visitante_id">
                    <i class="fas fa-plane-departure"></i>
                    Equipo Visitante
                    <span class="required">*</span>
                </label>
                <select name="equipo_visitante_id" id="equipo_visitante_id" class="form-control" required>
                    <option value="">Selecciona el equipo visitante</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" 
                            {{ old('equipo_visitante_id', $partido->equipo_visitante_id) == $equipo->id ? 'selected' : '' }}>
                            {{ $equipo->Nombre }}
                        </option>
                    @endforeach
                </select>
                @error('equipo_visitante_id')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Resultado -->
            <div class="grid">
                <div class="form-group">
                    <label for="goles_local">
                        <i class="fas fa-futbol"></i>
                        Goles Local
                        <span class="required">*</span>
                    </label>
                    <input type="number" name="goles_local" id="goles_local" 
                           class="form-control" min="0" max="99" 
                           value="{{ old('goles_local', $partido->goles_local) }}" required>
                    @error('goles_local')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="goles_visitante">
                        <i class="fas fa-futbol"></i>
                        Goles Visitante
                        <span class="required">*</span>
                    </label>
                    <input type="number" name="goles_visitante" id="goles_visitante" 
                           class="form-control" min="0" max="99" 
                           value="{{ old('goles_visitante', $partido->goles_visitante) }}" required>
                    @error('goles_visitante')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Fecha -->
            <div class="form-group">
                <label for="fecha">
                    <i class="far fa-calendar-alt"></i>
                    Fecha del Partido
                    <span class="required">*</span>
                </label>
                <input type="date" name="fecha" id="fecha" 
                       class="form-control" 
                       value="{{ old('fecha', $partido->fecha) }}" required>
                @error('fecha')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="btn-group">
                <a href="{{ route('partidos.show', $partido->id) }}" class="btn btn-cancel">
                    <i class="fas fa-times"></i>
                    Cancelar
                </a>
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i>
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
