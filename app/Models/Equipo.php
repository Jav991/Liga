<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
        protected $fillable = [
        'Nombre',
        'Logo',
        'Puntos', 
        'Goles_Favor',
        'Goles_Contra',
        'Presupuesto',
        'Entrenador'   
    ];

    public function partidosLocal(){
        return $this->hasMany(Partido::class, 'Equipo_Local');
    }

     public function partidosVisitante()
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }
}
