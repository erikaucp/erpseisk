<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parrillas as ModelsParrillas;
use App\Models\Clientes as ModelsClientes;


class Parrillas extends Controller
{
    public function index()
    {
        //Lista de clientes para crear parrillas
        $parrillas =ModelsParrillas::where('idEstado', '=', 1)->get();
        return view('admin.parrillas.lista', compact('parrillas'));
    }

    //Crear parrillas
    public function create()
    {
        $clientes = ModelsClientes::where('idEstado', '=', 1)->get();
        return view('admin.parrillas.create', compact('clientes'));
    }

    //Guardar parrillas
    public function save(Request $request)
    {
        $request->validate([
            'idCliente' => 'required',
            'mes' => 'required',
            'quincenaPublicacion' => 'required',
            'observaciones' => 'nullable',
        ],
        [
            'idCliente.required' => 'El campo cliente es obligatorio',
            'mes.required' => 'El campo mes es obligatorio',
            'quincenaPublicacion.required' => 'El campo quincena de publicación es obligatorio',
        ]);

        $fechaActual = now(); // Obtiene la fecha y hora actual

        $datos = new ModelsParrillas();
        
        $datos->mes = $request->mes;
        $datos->quincenaPublicacion = $request->quincenaPublicacion;
        $datos->observaciones = $request->observaciones;
        $datos->fechaCreacion = $fechaActual;
        $datos->idCliente = $request->idCliente;

        $datos->save();

        //aqui hacemos las notificaciones
        return redirect()->route('listaParrillas')->with('creado', 'ok');
    }
    
}
