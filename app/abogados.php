<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class abogados extends Model
{
    protected $table = 'abogados';
    //Columnas
    protected $fillable = [
        'nombre', 'cedula', 'telefono', 'caso_id'
    ];


    public function casos()
    {
        return $this->hasMany(casos::class);
    }
}
