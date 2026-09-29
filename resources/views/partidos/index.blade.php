@extends('layouts.app')
@section('title', 'Gestión de Partidos')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/partidos/style.css') }}">
@endsection
@section('title-section', 'Gestión de Partidos')
@section('content')
<div class="partidos-container">
    <div class="page-header">
        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <div>
                <h2><i class="fas fa-futbol"></i> Listado de Partidos</h2>
            </div>
            <a href="{{ route('partidos.create') }}" class="btn-add-partido">
                <i class="fas fa-plus-circle"></i>
                Registrar Partido
            </a>
        </div>
    </div>
    <div class="partidos-table-wrapper">
        @if($partidos->count() > 0)
            <table class="partidos-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Equipo Local</th>
                        <th>Resultado</th>
                        <th>Equipo Visitante</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partidos as $index => $partido)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        
                        <td>
                            <div class="equipo-nombre">
                                @if($partido->equipoLocal->Logo)
                                    <img src="{{ asset('storage/' . $partido->equipoLocal->Logo) }}" class="table-match-logo">
                                @else
                                    <i class="fas fa-shield-alt"></i>
                                @endif
                                {{ $partido->equipoLocal->Nombre }}
                            </div>
                        </td>
                        
                        <td>
                            <div class="partido-resultado">
                                {{ $partido->goles_local }} - {{ $partido->goles_visitante }}
                            </div>
                        </td>
                        
                        <td>
                            <div class="equipo-nombre">
                                @if($partido->equipoVisitante->Logo)
                                    <img src="{{ asset('storage/' . $partido->equipoVisitante->Logo) }}" class="table-match-logo">
                                @else
                                    <i class="fas fa-shield-alt"></i>
                                @endif
                                {{ $partido->equipoVisitante->Nombre }}
                            </div>
                        </td>
                        
                        <td>
                            <div class="partido-fecha">
                                <i class="far fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($partido->fecha)->format('d/m/Y') }}
                            </div>
                        </td>
                        
                        <td>
                            <div class="acciones-cell">
                                <a href="{{ route('partidos.show', $partido->id) }}" class="btn-action btn-view">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                <a href="{{ route('partidos.edit', $partido->id) }}" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST" class="action-form"
                                      onsubmit="return confirm('¿Estás seguro de eliminar {{ $partido->equipoLocal->Nombre }} vs {{ $partido->equipoVisitante->Nombre }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <p>No hay partidos registrados aún</p>
            </div>
        @endif
    </div>
</div>
@endsection