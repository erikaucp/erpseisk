<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $fillable = ['estado', 'fechaPublicacion', 'linkContenido', 'postCopyPublicacion', 'copyDiseno', 'linkReferencia', 'linkDescargaRecursos', 'observaciones', 'idParilla', 'idTipoContenido', 'idPlataforma'];

    public function parrilla()
    {
        return $this->belongsTo(ModelsParrillas::class,'idParilla');
    }

    public function tipoContenido()
    {
        return $this->belongsTo(ModelsTipoContenido::class,'idTipoContenido');
    }

    public function plataforma()
    {
        return $this->belongsTo(ModelsPlataformas::class, 'idPlataforma');
    }

    public function publicacionEmpleados()
    {
        return $this->hasMany(ModelsPublicacion_empleado::class, 'idPublicacion');
    }

    public function notificaciones()
    {
        return $this->belongsToMany(ModelsNotificaciones::class, 'notificacion_empleados', 'idPublicacion', 'idNotificacion');
    }
}
