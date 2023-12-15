<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administradores extends Model
{
    use HasFactory;

    protected $table = 'administradores';

    protected $fillable = ['identificacion', 'nombres', 'apellidos', 'email', 'idTipoIdentificacion', 'idEstado'];

    public function telefonos()
    {
        return $this->hasMany(TelefonosAdministradores::class, 'idAdministrador');
    }

}
