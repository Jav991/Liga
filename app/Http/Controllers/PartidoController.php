<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Equipo;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $partidos = Partido::all();
      return view('partidos.index', compact('partidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $equipos = Equipo::all();
        return view('partidos.create', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'goles_local' => 'required|integer|min:0',
            'goles_visitante' => 'required|integer|min:0',
            'fecha' => 'required|date',
        ]);

        
        $partido = Partido::create($request->all());
        $this->actualizarPuntos($partido);
        $this->actualizarGoles($partido);
        return redirect()->route('partidos.index')->with('success', 'Partido registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $partido = Partido::find($id);
       return view('partidos.show', compact('partido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $partido = Partido::find($id);
       $equipos = Equipo::all();
       return view('partidos.edit', compact('partido', 'equipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $partido = Partido::findOrFail($id);
         $datos = $request->validate([
         'equipo_local_id' => 'required|exists:equipos,id',
         'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
         'goles_local' => 'required|integer|min:0|max:99',
         'goles_visitante' => 'required|integer|min:0|max:99',
         'fecha' => 'required|date',
        ]);
        
        if(!$partido){
            return redirect()->route('partidos.index')->with('success', 'No se ha encontrado ningún partido con esas características');
        }
       

        $this->restarPuntos($partido);
        $this->restarGoles($partido);

        $partido->update($datos);

        $this->actualizarPuntos($partido);
        $this->actualizarGoles($partido );
     

        return redirect()->route('partidos.index')->with('success', 'Equipo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partido = Partido::find($id);
        if($partido){
            $this->restarGoles($partido);
            $this->restarPuntos($partido);
            $this->destroy($partido);
        }
        return redirect()->route('partidos.index')->with('succes', 'Partido eliminado correctamente');


    }
    public function actualizarPuntos($partido){
       // dd($partido->goles_local, $partido->goles_visitante);   
        $e1 = Equipo::find($partido->equipo_local_id);
        $e2 = Equipo::find($partido->equipo_visitante_id);

        $golesLocal = (int)$partido->goles_local;
        $golesVisitante = (int)$partido->goles_visitante;

        if($e1 == null || $e2 == null){
            return;
        }

        if($golesLocal >  $golesVisitante){
            // Gana el local
            $e1->Puntos += 3;
            $e1->save();
        }
        elseif($golesLocal< $golesVisitante){
            // Gana el visitante
            $e2->Puntos += 3;
            $e2->save();
        }
        else{
            // Empate
            $e1->Puntos += 1;
            $e2->Puntos += 1;
            $e1->save();
            $e2->save();
        }
    }

    public function restarPuntos($partido){
        //dd($partido->goles_local, $partido->goles_visitante);  
        $e1 = Equipo::find($partido->equipo_local_id);
        $e2 = Equipo::find($partido->equipo_visitante_id);

        $golesLocal = (int)$partido->goles_local;
        $golesVisitante = (int)$partido->goles_visitante;

        if($e1 == null || $e2 == null){
            return;
        }
        if($golesLocal >  $golesVisitante){
            $e1->Puntos -= 3;
            $e1->save();
        }
        elseif($golesLocal< $golesVisitante){
            $e2->Puntos -= 3;
            $e2->save();
        }
        else{
            // Empate
            $e1->Puntos -= 1;
            $e2->Puntos -= 1;
            $e1->save();
            $e2->save();
        }
    }

    public function actualizarGoles($partido){
        $e1 = Equipo::find($partido->equipo_local_id);
        $e2 = Equipo::find($partido->equipo_visitante_id);

        $e1->Goles_Favor+= $partido->goles_local;
        $e1->Goles_Contra += $partido->goles_visitante;

        $e2->Goles_Favor += $partido->goles_visitante;
        $e2->Goles_Contra += $partido->goles_local;

        $e1->save();
        $e2->save();
 
    }

    public function restarGoles($partido){
        $e1 = Equipo::find($partido->equipo_local_id);
        $e2 = Equipo::find($partido->equipo_visitante_id);

        $e1->Goles_Favor-= $partido->goles_local;
        $e1->Goles_Contra -= $partido->goles_visitante;

        $e2->Goles_Favor -= $partido->goles_visitante;
        $e2->Goles_Contra -= $partido->goles_local;

        $e1->save();
        $e2->save();
    }   
}
