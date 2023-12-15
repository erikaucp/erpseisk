<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion_empleados extends Model
{
    use HasFactory;

    protected $table = 'notificacion_empleado';

    public function notificacion()
    {
        return $this->belongsTo('App\Notificacion', 'idNotificacion', 'id');
    }

    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'idEmpleado', 'id');
    }

}
