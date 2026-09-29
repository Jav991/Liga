@extends('layouts.app')

@section('title', $equipoBuscado->Nombre . ' - Resultado del Filtro')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/equipos/show.css') }}">
@endsection

@section('content')
<div class="show-container">
    <!-- Header del Equipo -->
    <div class="profile-header">
        <div class="team-logo-container">
            @if($equipoBuscado->Logo)
                <img src="{{ asset('storage/' . $equipoBuscado->Logo) }}" alt="Escudo {{ $equipoBuscado->Nombre }}" class="img-header-escudo">
            @else
                <div class="team-icon-default">
                    <i class="fas fa-shield-alt"></i>
                </div>
            @endif
        </div>
        <h1>{{ $equipoBuscado->Nombre }}</h1>
        @if($equipoBuscado->Entrenador)
        <p class="coach-info">
            <i class="fas fa-user-tie"></i> 
            Entrenador: {{ $equipoBuscado->Entrenador }}
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
            <div class="stat-value">{{ $equipoBuscado->Puntos ?? 0 }}</div>
        </div>

        <!-- Goles Favor -->
        <div class="stat-card stat-favor">
            <div class="stat-icon">
                <i class="fas fa-arrow-up"></i>
            </div>
            <div class="stat-title">GOL. FAVOR</div>
            <div class="stat-value text-success">{{ $equipoBuscado->Goles_Favor ?? 0 }}</div>
        </div>

        <!-- Goles Contra -->
        <div class="stat-card stat-contra">
            <div class="stat-icon">
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="stat-title">GOL. CONTRA</div>
            <div class="stat-value text-danger">{{ $equipoBuscado->Goles_Contra ?? 0 }}</div>
        </div>

        <!-- Presupuesto -->
        <div class="stat-card stat-budget">
            <div class="stat-icon">
                <i class="fas fa-wallet"></i>
            </div>
            <div class="stat-title">PRESUPUESTO</div>
            <div class="stat-value stat-budget-value">
                @if($equipoBuscado->Presupuesto)
                    {{ number_format($equipoBuscado->Presupuesto, 0, ',', '.') }}€
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
            <span class="diff-value {{ (($equipoBuscado->Goles_Favor ?? 0) - ($equipoBuscado->Goles_Contra ?? 0)) >= 0 ? 'positive' : 'negative' }}">
                {{ ($equipoBuscado->Goles_Favor ?? 0) - ($equipoBuscado->Goles_Contra ?? 0) }}
            </span>
        </div>
    </div>

    <!-- Botones -->
    <div class="buttons">
        <a href="{{ route('equipos.index') }}" class="btn-custom btn-volver">
            <i class="fas fa-chevron-left"></i> Volver al listado
        </a>
        <a href="{{ route('equipos.edit', $equipoBuscado->id) }}" class="btn-custom btn-editar">
            <i class="fas fa-edit"></i> Editar Datos
        </a>
    </div>
</div>
@endsection