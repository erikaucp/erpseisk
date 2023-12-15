<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plataformas as ModelsPlataformas;
use App\Models\Clientes as ModelsClientes;

class PlataformasController extends Controller
{
    /**
     * Display a listing of the resource.
        */
    public function index()
    {
        
        /* $clientes = ModelsClientes::where('idEstado', '=', 1)->get();
        $plataformas = ModelsPlataformas::where('idEstado', '=', 1)->get();
        return view('admin.clientes.plataformas.create', compact('plataformas','clientes')); */
        
    }

    //public function create(Request $request, $cliente)
    public function create($id)
    {
        $cliente = ModelsClientes::find($id);

        if (!$cliente) {
            // Maneja el caso en el que el cliente no se encuentra
            // Puedes redirigir o mostrar un mensaje de error, como se muestra a continuación
            return redirect()->back()->with('error', 'Cliente no encontrado');
        }

        $plataformas = ModelsPlataformas::where('idCliente', $id)->get();

        // Ahora, $cliente y $plataformas contienen la información que necesitas en la vista
        return view('admin.clientes.plataformas.create', compact('cliente', 'plataformas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        //dd($request->all()); // Agrega esta línea para depurar y verifica la presencia del ID del cliente

        $request->validate(
            [
                'nombre' => 'required',
                'url' => 'required',
                'descripcion' => 'nullable',
                'idCliente' => 'required', // Agrega esta validación para asegurarte de que idCliente esté presente
            ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'url.required' => 'El campo url es obligatorio',
                'descripcion.nullable' => '-',
                'idCliente.required' => 'El ID del cliente es obligatorio',
            ]
        );

        $datos = new ModelsPlataformas();

        $datos->nombre = $request->nombre;
        $datos->url = $request->url;
        $datos->descripcion = $request->descripcion;
        $datos->idCliente = $request->idCliente;

        $datos->save();

        // Aquí puedes hacer las notificaciones y redirigir según sea necesario
        return redirect()->route('crearPlataforma', $request->idCliente)->with('creado', 'ok');
    }


    /**
     * Display the specified resource.
     */
    public function show(ModelsPlataformas $plataformas)
    {
        //
    }
  /*   public function list($cliente)
    {
        $datos = ModelsPlataformas::find($cliente);

        return view('admin.clientes.plataformas.create', compact('datos'));
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsPlataformas $plataformas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsPlataformas $plataformas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsPlataformas $plataformas)
    {
        //
    }
}
