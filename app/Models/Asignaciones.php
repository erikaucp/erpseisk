<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaciones extends Model
{
    use HasFactory;

    protected $table = 'asignaciones';

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'idCliente', 'id');
    }

    public function empleado()
    {
        return $this->belongsTo('App\Community', 'idEmpleado', 'id');
    }
}
