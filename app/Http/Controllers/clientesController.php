<?php

namespace App\Http\Controllers;

use App\cliente;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    public function index()
    {
        $clientes = cliente::all();
        return view("clientes",["clientes" => $clientes]);
    }

    public function create(Request $request)
    {
        cliente::create([
            'nombre' => $request->nombre,
            'cedula' => $request->cedula,
            'telefono' =>  $request->telefono,

        ]);
        return redirect()->action('clientesController@index')->with('crear', 'Cliente creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $cliente = cliente::findOrFail($id);
        $cliente->nombre = $request->nombre;
        $cliente->cedula = $request->cedula;
        $cliente->telefono = $request->telefono;
        $cliente->save();
        return redirect()->action('clientesController@index')->with('editar', 'Cliente actualizado correctamente');
        
    }
}
