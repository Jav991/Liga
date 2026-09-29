@extends('layouts.app')

@section('title', 'Registrar Partido')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/partidos/create.css') }}">
@endsection

@section('title-section', 'Registrar Nuevo Partido')

@section('content')
<div class="create-container">
    <div class="form-card">
        <!-- Header del formulario -->
        <div class="form-header">
            <i class="fas fa-futbol"></i>
            <h2>Registrar Nuevo Partido</h2>
            <p>Completa los datos del partido</p>
        </div>

        <!-- Formulario -->
        <form action="{{ route('partidos.store') }}" method="POST" class="partido-form">
            @csrf

            <!-- Equipo Local -->
            <div class="form-group">
                <label for="equipo_local_id">
                    <i class="fas fa-home"></i>
                    Equipo Local
                </label>
                <select name="equipo_local_id" id="equipo_local_id" class="form-control" required>
                    <option value="">Selecciona el equipo local</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" {{ old('equipo_local_id') == $equipo->id ? 'selected' : '' }}>
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
                </label>
                <select name="equipo_visitante_id" id="equipo_visitante_id" class="form-control" required>
                    <option value="">Selecciona el equipo visitante</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" {{ old('equipo_visitante_id') == $equipo->id ? 'selected' : '' }}>
                            {{ $equipo->Nombre }}
                        </option>
                    @endforeach
                </select>
                @error('equipo_visitante_id')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Resultado -->
            <div class="form-row">
                <div class="form-group">
                    <label for="goles_local">
                        <i class="fas fa-futbol"></i>
                        Goles Local
                    </label>
                    <input type="number" name="goles_local" id="goles_local" 
                           class="form-control" min="0" max="99" 
                           value="{{ old('goles_local', 0) }}" required>
                    @error('goles_local')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="goles_visitante">
                        <i class="fas fa-futbol"></i>
                        Goles Visitante
                    </label>
                    <input type="number" name="goles_visitante" id="goles_visitante" 
                           class="form-control" min="0" max="99" 
                           value="{{ old('goles_visitante', 0) }}" required>
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
                </label>
                <input type="date" name="fecha" id="fecha" 
                       class="form-control" value="{{ old('fecha', date('Y-m-d')) }}" required>
                @error('fecha')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="form-actions">
                <a href="{{ route('partidos.index') }}" class="btn-cancel">
                    <i class="fas fa-times"></i>
                    Cancelar
                </a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-check"></i>
                    Registrar Partido
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
