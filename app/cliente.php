<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table = 'cliente';
    //Columnas
    protected $fillable = [
        'nombre', 'cedula', 'telefono'
    ];

    public function casos()
    {
        return $this->hasMany(casos::class);
    }

}
