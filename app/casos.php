<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class casos extends Model
{
    protected $table = 'casos';
    //Columnas
    protected $fillable = [
        'nombre', 'fecha_inicio', 'fecha_fin','estado','cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsToMany(cliente::class);
    }

    public function abogados()
    {
        return $this->belongsToMany(abogados::class);
    }
}
