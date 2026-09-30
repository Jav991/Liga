<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use Illuminate\Support\Facades\Storage;

class EquipoController extends Controller
{
    public function index(){
        $equipos = Equipo::orderBy('Puntos', 'desc')->orderByRaw('Goles_Favor - Goles_Contra DESC')->get();
        return view('equipos.index', compact('equipos'));
    }

    public function create(){
        return view('equipos.create');
    }

    public function show($id){
        $equipo = Equipo::find($id);
        return view('equipos.show', compact('equipo'));
    }

    public function store(Request $request){
        // 1. Validar los datos
        $datos = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Logo' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
            'Puntos' => 'nullable|integer',
            'Goles_Favor' => 'nullable|integer',
            'Goles_Contra' => 'nullable|integer',
            'Presupuesto' => 'nullable|numeric',
            'Entrenador' => 'nullable|string|max:255',
        ]);

        // 2. Guardar la imagen en 'storage/app/public/escudos' si existe
        if($request->hasFile('Logo')){
            $datos['Logo'] = $request->file('Logo')->store('escudos', 'public');
        }

        // 3. Crear el equipo utilizando la variable $datos procesada
        Equipo::create($datos);

        // 4. Redirigir a la ruta correcta
        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente');
    }

    public function edit($id){
        $equipo = Equipo::find($id);
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, $id){
        $equipo = Equipo::find($id);
        $datos = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Logo' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
            'Puntos' => 'nullable|integer',
            'Goles_Favor' => 'nullable|integer',
            'Goles_Contra' => 'nullable|integer',
            'Presupuesto' => 'nullable|numeric',
            'Entrenador' => 'nullable|string|max:255',
        ]);

        if($request->hasFile('Logo')){
            if($equipo->Logo && !str_contains($equipo->Logo, '/tmp/')){
                Storage::disk('public')->delete($equipo->Logo);
            }
            $datos['Logo'] = $request->file('Logo')->store('escudos', 'public');
        }
        else{
            unset($datos['Logo']);
        }

        $equipo->update($datos);
        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente');
    }

    public function destroy($id){
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente');
    }

    public function filtro(Request $request, $nombre = null){
        $equipos = Equipo::all();
        $equipoBuscado = null;

        if($nombre === null || $nombre === ''){
            return redirect()->route('equipos.index')->with('error', 'No se especificó ningún equipo.');
        }

        foreach($equipos as $equipo){
            if($equipo->Nombre === $nombre){  
                $equipoBuscado = $equipo;
                break;
            }
        }

        if(!$equipoBuscado){
            return redirect()->route('equipos.index')->with('error', 'No se encontró el equipo con nombre: ' . $nombre);
        }
        return view('equipos.filtroEquipo', compact('equipoBuscado'));
    }

    public function presupuesto($presupuesto){
        $equipos = Equipo::all();
        foreach($equipos as $equipo){
            if($equipo->Nombre === $presupuesto){  
                $equipoBuscado = $equipo;
                break;
            }
        }
    }
}