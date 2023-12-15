<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataformas extends Model
{
    use HasFactory;
    
    protected $table = 'plataformas';

    public function cliente()
    {
        return $this->belongsTo(ModelsClientes::class, 'idCliente');
    }

}
