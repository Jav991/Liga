@extends('layouts.app')

@section('title', 'Detalle del Encuentro')

@section('styles')
    {{-- Asegúrate de que el archivo esté en public/css/show.css --}}
    <link rel="stylesheet" href="{{ asset('css/partidos/show.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="show-container">
    
    {{-- CABECERA: SCOREBOARD PROFESIONAL --}}
    <div class="zona-partido-header">
        <div class="fila-enfrentamiento">
            
            {{-- Local --}}
            <div class="bloque-equipo-unico">
                <div class="contenedor-escudo-fijo">
                    @if($partido->equipoLocal && $partido->equipoLocal->Logo)
                        <img src="{{ asset('storage/' . $partido->equipoLocal->Logo) }}" alt="Logo Local" class="img-ajustada">
                    @else
                        <div class="placeholder-icon"><i class="fas fa-shield-alt"></i></div>
                    @endif
                </div>
                <h2 class="nombre-equipo-show">{{ $partido->equipoLocal->Nombre ?? 'Local' }}</h2>
            </div>

            {{-- Marcador Central --}}
            <div class="bloque-marcador-central">
                <div class="cifra-resultado">
                    {{ $partido->goles_local }}<span>-</span>{{ $partido->goles_visitante }}
                </div>
                <div class="etiqueta-fecha">
                    <i class="far fa-calendar-alt"></i> 
                    {{ \Carbon\Carbon::parse($partido->fecha)->translatedFormat('d M, Y') }}
                </div>
            </div>

            {{-- Visitante --}}
            <div class="bloque-equipo-unico">
                <div class="contenedor-escudo-fijo">
                    @if($partido->equipoVisitante && $partido->equipoVisitante->Logo)
                        <img src="{{ asset('storage/' . $partido->equipoVisitante->Logo) }}" alt="Logo Visitante" class="img-ajustada">
                    @else
                        <div class="placeholder-icon"><i class="fas fa-shield-alt"></i></div>
                    @endif
                </div>
                <h2 class="nombre-equipo-show">{{ $partido->equipoVisitante->Nombre ?? 'Visitante' }}</h2>
            </div>

        </div>
    </div>

    {{-- TARJETAS DE INFORMACIÓN (GRID) --}}
    <div class="stats-container">
        <div class="stat-card">
            <i class="fas fa-map-marked-alt stat-icon"></i>
            <div class="stat-title">Estadio</div>
            <div class="stat-value">{{ $partido->equipoLocal->Estadio ?? 'Sede Oficial' }}</div>
        </div>

        <div class="stat-card">
            <i class="fas fa-trophy stat-icon"></i>
            <div class="stat-title">Competición</div>
            <div class="stat-value">LIGA GAMER</div>
        </div>

        <div class="stat-card">
            <i class="fas fa-check-double stat-icon"></i>
            <div class="stat-title">Estado</div>
            <div class="stat-value" style="color: #10b981;">FINALIZADO</div>
        </div>
    </div>
    <div class="buttons">
        <a href="{{ route('partidos.index') }}" class="btn-custom btn-volver">
            <i class="fas fa-arrow-left"></i> VOLVER AL LISTADO
        </a>
        <a href="{{ route('partidos.edit', $partido->id) }}" class="btn-custom btn-editar">
            <i class="fas fa-edit"></i> EDITAR RESULTADO
        </a>
    </div>
</div>
@endsection