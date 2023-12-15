<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parrillas;
use App\Models\Plataformas;

class Clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    public function asignaciones()
    {
        return $this->hasMany('App\Models\Asignacion', 'idCliente', 'id');
    }

    public function parrillas()
    {
        return $this->hasMany('App\Models\Parrilla', 'idCliente', 'id');
    }

    // public function plataformas()
    // {
    //     return $this->hasMany('App\Models\Plataforma', 'idCliente', 'id');
    // }

    public function plataformas()
    {
        return $this->hasMany(ModelsPlataformas::class, 'idCliente');
    }

}
