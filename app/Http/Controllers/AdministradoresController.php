<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores as ModelsAdministradores;
use App\Models\TelefonosAdministradores as ModelsTelefonosAdministradores;

class AdministradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administradores = \App\Models\Administradores::where('idEstado', '=', 1)->get();
        return view('admin.clientes.administradores.lista', compact('administradores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clientes.administradores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        $request->validate(
            [
                'identificacion' => 'required',
                'nombres' => 'required',
                'apellidos' => 'required',
                'email' => 'required|email|unique:administradores',
                'idTipoIdentificacion' => 'required',
                'telefonos' => 'array', // Asegura que la entrada para teléfonos sea un array
                'telefonos.*' => 'nullable|numeric|digits:7', // Asegura que cada teléfono sea numérico y tenga 7 dígitos
            ],
            [
                'email.unique' => 'El correo ingresado ya está en uso.',
            ]
        );

        $administrador = ModelsAdministradores::create([
            'identificacion' => $request->identificacion,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'idTipoIdentificacion' => $request->idTipoIdentificacion,

        ]);

        // Asociar teléfonos al administrador
        /* if ($request->has('telefonos')) {
            foreach ($request->telefonos as $telefono) {
                ModelsTelefonosAdministradores::create([
                    'numero' => $telefono,
                    'idAdministrador' => $administrador->id,
                ]);
            }
        } */

        // Redirige a donde sea necesario
        return redirect()->route('crearCliente')->with('creado', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $administrador = ModelsAdministradores::find($id);
        return view('admin.clientes.administradores.edit', compact('administrador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
