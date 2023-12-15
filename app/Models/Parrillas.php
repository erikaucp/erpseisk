<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;

class Parrillas extends Model
{
    use HasFactory;

    protected $table = 'parrillas';

    public function cliente()
    {
        //return $this->belongsTo('App\Models\Clientes', 'idCliente', '4');
        return $this->belongsTo('App\Models\Clientes', 'idCliente', 'id');
    }

    public function publicaciones()
    {
        //return $this->hasMany('App\Models\Publicaciones', 'idParilla', '4');
        return $this->hasMany('App\Models\Publicaciones', 'idParilla', 'id');
    }
}
