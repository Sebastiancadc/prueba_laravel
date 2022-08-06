<?php

namespace App\Http\Controllers;

use App\abogados;
use App\casos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class abogadosController extends Controller
{
    public function index()
    {
        $abogados = DB::select('SELECT *,abogados.nombre as abogado,abogados.id as id,casos.nombre as caso,casos.id as caso_id FROM abogados
        INNER JOIN casos ON abogados.caso_id = casos.id');
        $casos = casos::all();
        return view("abogados",["abogados" => $abogados,"casos" => $casos]);
    }

    public function create(Request $request)
    {
        abogados::create([
            'nombre' => $request->nombre,
            'cedula' => $request->cedula,
            'telefono' =>  $request->telefono,
            'caso_id' => $request->caso,
        ]);
        return redirect()->action('abogadosController@index')->with('crear', 'Abogado creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $abogados = abogados::findOrFail($id);
        $abogados->nombre = $request->nombre;
        $abogados->cedula = $request->cedula;
        $abogados->telefono = $request->telefono;
        $abogados->caso_id = $request->caso;
        $abogados->save();
        return redirect()->action('abogadosController@index')->with('editar', 'Abogado actualizado correctamente');
        
    }
}
