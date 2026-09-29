@extends('layouts.app')

@section('title-section', 'Listado de Equipos')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/equipos/style.css') }}">
@endsection

@section('content')
<div class="index-container">
    <div class="index-header">
        <div class="header-content">
            <div class="header-text">
                <h1 class="header-title">
                    <i class="fas fa-futbol"></i>
                    Listado de Equipos
                </h1>
                <p class="header-subtitle">Gestiona todos los equipos de La Liga con el sistema de escudos actualizado</p>
            </div>
            <div class="header-actions">
               <form method="GET" class="search-box" onsubmit="return filtro(event)">
                    <i class="fas fa-search search-icon"></i>
                    <input type="search" name="nombre" id="nombreEquipo" placeholder="Buscar equipo..." class="search-input" required>
                    <button type="submit" style="display: none;"></button>
                </form>
                <a href="{{ route('equipos.create') }}" class="btn-add">
                    <i class="fas fa-plus"></i>
                    Añadir Equipo
                </a>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-wrapper">
            <table class="equipos-table">
                <thead>
                    <tr>
                        <th class="th-number">#</th>
                        <th class="th-team">Equipo</th>
                        <th class="th-logo">Escudo</th>
                        <th class="th-points">Puntos</th>
                        <th class="th-gf">Gf</th>
                        <th class="th-gc">Gc</th>
                        <th class="th-dg">Dg</th>
                        <th class="th-budget">Presupuesto</th>
                        <th class="th-coach">Entrenador</th>
                        <th class="th-actions">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($equipos as $index => $equipo)
                    <tr class="table-row">
                        <td class="td-number">{{ $index + 1 }}</td>
                        <td class="td-team">{{ $equipo->Nombre }}</td>
                        <td class="td-team">
                            <div style="display: flex; align-items: center; gap: 35px;">
                                @if($equipo->Logo)
                                    <img src="{{ asset('storage/' . $equipo->Logo) }}" class="img-escudo">
                                @else
                                    <i class="fas fa-shield-alt no-logo-icon"></i>
                                @endif
                            </div>
                        </td>
                        <td class="td-points">
                            <span class="badge-points">{{ $equipo->Puntos ?? 0 }}</span>
                        </td>
                        <td class="td-center">
                            <span class="stat-favor">{{ $equipo->Goles_Favor ?? 0 }}</span>
                        </td>
                        <td class="td-center">
                            <span class="stat-contra">{{ $equipo->Goles_Contra ?? 0 }}</span>
                        </td>
                        <td class="td-center">
                            @php 
                                $dg = ($equipo->Goles_Favor ?? 0) - ($equipo->Goles_Contra ?? 0); 
                            @endphp
                            <span class="{{ $dg > 0 ? 'stat-favor' : ($dg < 0 ? 'stat-contra' : '') }}" style="font-weight: 800;">
                                {{ $dg > 0 ? '+' : '' }}{{ $dg }}
                            </span>
                        </td>
                        <td class="td-budget">
                            <span class="stat-budget">€{{ number_format($equipo->Presupuesto ?? 0, 0, ',', '.') }}</span>
                        </td>
                        <td class="td-coach">
                            <div class="coach-info">
                                <i class="fas fa-user-tie"></i>
                                <span>{{ $equipo->Entrenador ?? 'Sin asignar' }}</span>
                            </div>
                        </td>
                        <td class="td-actions">
                            <div class="actions-group">
                                <a href="{{ route('equipos.show', $equipo) }}" class="btn-action btn-view" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('equipos.edit', $equipo) }}" class="btn-action btn-edit" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form 
                                    action="{{ route('equipos.destroy', $equipo) }}" 
                                    method="POST" 
                                    class="action-form" 
                                    onsubmit="return confirm('¿Estás seguro de eliminar al {{ $equipo->Nombre }}?')"
                                >
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Borrar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="empty-state">
                            <i class="fas fa-folder-open empty-icon"></i>
                            <h3 class="empty-title">No hay equipos registrados</h3>
                            <p class="empty-text">Parece que la liga está vacía. ¡Crea el primer equipo ahora!</p>
                            <a href="{{ route('equipos.create') }}" class="btn-create-first">
                                <i class="fas fa-plus"></i> Crear Primer Equipo
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="table-footer">
            <div class="footer-info">
                <i class="fas fa-chart-line"></i>
                <span>Equipos en competición: <strong>{{ $equipos->count() }}</strong></span>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/filtro.js') }}"></script>
@endsection