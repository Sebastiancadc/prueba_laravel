<?php

namespace App\Http\Controllers;

use App\casos;
use App\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class casosController extends Controller
{
    public function index()
    {
        $casos = DB::select('SELECT *,casos.nombre as nombre,casos.id as id,cliente.nombre as nombre_cli FROM casos
        INNER JOIN cliente ON casos.cliente_id = cliente.id');
        $cliente = cliente::all();
        return view("casos",["casos" => $casos,"cliente" => $cliente]);
    }

    public function create(Request $request)
    {
        casos::create([
            'nombre' => $request->nombre,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' =>  $request->fecha_fin,
            'estado' => $request->estado,
            'cliente_id' => $request->cliente_id,

        ]);
        return redirect()->action('casosController@index')->with('crear', 'Caso creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $caso = casos::findOrFail($id);
        $caso->nombre = $request->nombre;
        $caso->fecha_inicio = $request->fecha_inicio;
        $caso->fecha_fin = $request->fecha_fin;
        $caso->estado = $request->estado;
        $caso->cliente_id = $request->cliente_id;
        $caso->save();
        return redirect()->action('casosController@index')->with('editar', 'Caso actualizado correctamente');
        
    }
}
