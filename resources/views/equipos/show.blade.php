@extends('layouts.app')

@section('title', $equipo->Nombre . ' - Ficha Técnica')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/equipos/show.css') }}">
@endsection

@section('content')
<div class="show-container">
    <!-- Header del Equipo -->
    <div class="profile-header">
        <div class="team-logo-container">
            @if($equipo->Logo)
                <img src="{{ asset('storage/' . $equipo->Logo) }}" alt="Escudo {{ $equipo->Nombre }}" class="img-header-escudo">
            @else
                <div class="team-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
            @endif
        </div>
        <div class="team-icon">
            <i class="fas fa-futbol"></i>
        </div>
        <h1>{{ $equipo->Nombre }}</h1>
        @if($equipo->Entrenador)
        <p class="coach-info">
            <i class="fas fa-user-tie"></i> 
            Entrenador: {{ $equipo->Entrenador }}
        </p>
        @endif
    </div>

    <!-- Stats Container -->
    <div class="stats-container">
        <!-- Puntos -->
        <div class="stat-card stat-points">
            <div class="stat-icon">
                <i class="fas fa-trophy"></i>
            </div>
            <div class="stat-title">PUNTOS</div>
            <div class="stat-value">{{ $equipo->Puntos ?? 0 }}</div>
        </div>

        <!-- Goles Favor -->
        <div class="stat-card stat-favor">
            <div class="stat-icon">
                <i class="fas fa-arrow-up"></i>
            </div>
            <div class="stat-title">GOL. FAVOR</div>
            <div class="stat-value text-success">{{ $equipo->Goles_Favor ?? 0 }}</div>
        </div>

        <!-- Goles Contra -->
        <div class="stat-card stat-contra">
            <div class="stat-icon">
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="stat-title">GOL. CONTRA</div>
            <div class="stat-value text-danger">{{ $equipo->Goles_Contra ?? 0 }}</div>
        </div>

        <!-- Presupuesto -->
        <div class="stat-card stat-budget">
            <div class="stat-icon">
                <i class="fas fa-wallet"></i>
            </div>
            <div class="stat-title">PRESUPUESTO</div>
            <div class="stat-value stat-budget-value">
                @if($equipo->Presupuesto)
                    {{ number_format($equipo->Presupuesto, 0, ',', '.') }}€
                @else
                    N/A
                @endif
            </div>
        </div>
    </div>

    <!-- Diferencia de goles -->
    <div class="difference-container">
        <div class="difference">
            <i class="fas fa-chart-line"></i>
            Diferencia de Goles: 
            <span class="diff-value {{ (($equipo->GolesFavor ?? 0) - ($equipo->GolesContra ?? 0)) >= 0 ? 'positive' : 'negative' }}">
                {{ ($equipo->Goles_Favor ?? 0) - ($equipo->Goles_Contra ?? 0) }}
            </span>
        </div>
    </div>

    <!-- Botones -->
    <div class="buttons">
        <a href="{{ route('equipos.index') }}" class="btn-custom btn-volver">
            <i class="fas fa-chevron-left"></i> Volver al listado
        </a>
        <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-custom btn-editar">
            <i class="fas fa-edit"></i> Editar Datos
        </a>
    </div>
</div>
@endsection
