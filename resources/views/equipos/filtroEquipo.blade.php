@extends('layouts.app')
@section('title', $equipoBuscado ? $equipoBuscado->Nombre . ' - Resultado del Filtro' : 'Equipo no encontrado')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/equipos/show.css') }}">
@endsection
@section('content')
<div class="show-container">
    @if($equipoBuscado)
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
        <div class="stats-container">
            <div class="stat-card stat-points">
                <div class="stat-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="stat-title">PUNTOS</div>
                <div class="stat-value">{{ $equipoBuscado->Puntos ?? 0 }}</div>
            </div>
            <div class="stat-card stat-favor">
                <div class="stat-icon">
                    <i class="fas fa-arrow-up"></i>
                </div>
                <div class="stat-title">GOL. FAVOR</div>
                <div class="stat-value text-success">{{ $equipoBuscado->Goles_Favor ?? 0 }}</div>
            </div>
            <div class="stat-card stat-contra">
                <div class="stat-icon">
                    <i class="fas fa-arrow-down"></i>
                </div>
                <div class="stat-title">GOL. CONTRA</div>
                <div class="stat-value text-danger">{{ $equipoBuscado->Goles_Contra ?? 0 }}</div>
            </div>
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
        <div class="difference-container">
            <div class="difference">
                <i class="fas fa-chart-line"></i>
                Diferencia de Goles: 
                <span class="diff-value {{ (($equipoBuscado->Goles_Favor ?? 0) - ($equipoBuscado->Goles_Contra ?? 0)) >= 0 ? 'positive' : 'negative' }}">
                    {{ ($equipoBuscado->Goles_Favor ?? 0) - ($equipoBuscado->Goles_Contra ?? 0) }}
                </span>
            </div>
        </div>
        <div class="buttons">
            <a href="{{ route('equipos.index') }}" class="btn-custom btn-volver">
                <i class="fas fa-chevron-left"></i> Volver al listado
            </a>
            <a href="{{ route('equipos.edit', $equipoBuscado->id) }}" class="btn-custom btn-editar">
                <i class="fas fa-edit"></i> Editar Datos
            </a>
        </div>
    @else
        <div class="bg-gray-800 border border-red-500 text-white px-8 py-10 rounded-xl text-center shadow-2xl my-12 max-w-lg mx-auto">
            <div class="text-red-500 mb-4">
                <i class="fas fa-exclamation-triangle fa-3x"></i>
            </div>
            <h2 class="text-2xl font-bold mb-2">¡Equipo no encontrado!</h2>
            <p class="text-gray-400 mb-6">
                Lo sentimos, no hay ningún registro en el sistema con el nombre: 
                <span class="text-white font-semibold">"{{ $nombre ?? 'Desconocido' }}"</span>
            </p>
            <div>
                <a href="{{ route('equipos.index') }}" class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2.5 rounded-lg transition">
                    <i class="fas fa-chevron-left mr-2"></i> Volver al listado de equipos
                </a>
            </div>
        </div>
    @endif
</div>
@endsection