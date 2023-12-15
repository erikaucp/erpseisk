<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonosAdministradores extends Model
{
    use HasFactory;

    protected $table = 'telefonos_administradores';

    protected $fillable = [
        'numero',
        'idAdministrador',
    ];

    // Relación con el modelo Administradores
    public function administrador()
    {
        return $this->belongsTo(Administradores::class, 'idAdministrador');
    }

}
