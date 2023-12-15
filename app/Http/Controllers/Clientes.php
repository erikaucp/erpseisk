<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores as ModelsAdministradores;
use App\Models\Clientes as ModelsClientes;
use App\Models\TiposIdentificacion as ModelsTiposIdentificacion;

class Clientes extends Controller
{
    public function index()
    {   
        $clientes = ModelsClientes::where('idEstado', '=', 1)->get();
        $administradores = ModelsAdministradores::where('idEstado', '=', 1)->get();
        $tiposIdentificacion = ModelsTiposIdentificacion::all();
        return view('admin.clientes.lista', compact('clientes', 'administradores', 'tiposIdentificacion'));
    }
    
    public function create()
    {
        $administradores = ModelsAdministradores::where('idEstado', '=', 1)->get();
        return view('admin.clientes.create', compact('administradores'));
    
    }

    public function show()
    {

    }

    public function save(Request $request)
    {
        $request->validate(
            [
                'idTipoIdentificacion' => 'required',
                'identificacion' => 'required',
                'empresa' => 'required',
                'direccion' => 'required',
                'tipo' => 'required',
                'observaciones' => 'nullable',
                'idAdministrador' => 'required', // Agrega validación para el ID del administrador
            ],
            [
                'idTipoIdentificacion.required' => 'El campo tipo de identificación es obligatorio',
                'identificacion.required' => 'El campo Número de identificación es obligatorio',
                'empresa.required' => 'El campo Empresa es obligatorio',
                'direccion.required' => 'El campo direccion es obligatorio',
                'tipo.required' => 'El campo tipo de cliente es obligatorio',
                'observaciones.nullable' => '-',
                'idAdministrador.required' => 'Debe seleccionar un administrador',
            ]
        );

        $datos = new ModelsClientes();

        $datos->identificacion = $request->identificacion;
        $datos->empresa = $request->empresa;
        $datos->direccion = $request->direccion;
        $datos->tipo = $request->tipo;
        $datos->observaciones = $request->observaciones;
        $datos->idTipoIdentificacion = $request->idTipoIdentificacion;
        $datos->idAdministrador = $request->idAdministrador; // Asigna el ID del administrador seleccionado

        $datos->save();

        //aqui hacemos las notificaciones
        return redirect()->route('listaClientes')->with('creado', 'ok');

    }

    public function edit($cliente)
    {
        $datos = ModelsClientes::find($cliente);
        
        return view('admin.clientes.edit', compact('datos'));
    }

    public function update(Request $request, $cliente)
    {
        $request->validate(
            [
                'idTipoIdentificacion' => 'required',
                'identificacion' => 'required',
                'empresa' => 'required',
                'direccion' => 'required',
                'tipo' => 'required',
                'observaciones' => 'nullable',
            ],
            [
                'idTipoIdentificacion.required' => 'El campo tipo de identificación es obligatorio',
                'identificacion.required' => 'El campo Número de identificación es obligatorio',
                'empresa.required' => 'El campo Empresa es obligatorio',
                'direccion.required' => 'El campo direccion es obligatorio',
                'tipo.required' => 'El campo tipo de cliente es obligatorio',
                'observaciones.nullable' => '-',
            ]
        );

        $datos = ModelsClientes::find($cliente);

        $datos->identificacion = $request->identificacion;
        $datos->empresa = $request->empresa;
        $datos->direccion = $request->direccion;
        $datos->tipo = $request->tipo;
        $datos->observaciones = $request->observaciones;
        $datos->idTipoIdentificacion = $request->idTipoIdentificacion;
        $datos->idAdministrador = 1;
        
        $datos->save();

        return redirect()->route('listaClientes')->with('actualizar','ok');
    }
    

}