<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion_empleados extends Model
{
    use HasFactory;

    protected $table = 'publicacion_empleados';

    public function publicacion()
    {
        return $this->belongsTo(Publicaciones::class, 'idPublicacion', 'id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'id');
    }
}
