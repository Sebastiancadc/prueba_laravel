<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $datos = DB::select('SELECT casos.nombre as caso,cliente.nombre as cliente,abogados.nombre as abogado, casos.estado as estado,casos.fecha_inicio,casos.fecha_fin FROM casos
        INNER JOIN cliente ON casos.cliente_id = cliente.id
        INNER JOIN abogados ON abogados.caso_id = casos.id');
        // dd($datos);
        return view("/inicio",["datos" => $datos]);
    }
}
