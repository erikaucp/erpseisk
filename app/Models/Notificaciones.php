<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    public function publicaciones()
    {
        return $this->belongsToMany(Publicaciones::class, 'notificacion_empleados', 'idNotificacion', 'idPublicacion');
    }
}
