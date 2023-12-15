<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publicaciones;

class TipoContenido extends Model
{
    use HasFactory;

    protected $table = 'tipo_contenidos';

    public function publicaciones()
    {
        return $this->hasMany(Publicaciones::class, 'idTipoContenido', '1');
        //return $this->hasMany('App\Models\Publicaciones', 'idTipoContenido', 'id');
    }
}
