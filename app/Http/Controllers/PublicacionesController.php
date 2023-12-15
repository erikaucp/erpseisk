<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicaciones as ModelsPublicaciones;
use App\Models\TipoContenido as ModelsTipoContenido;
use App\Models\Plataformas as ModelsPlataformas;
use App\Models\Parrillas as ModelsParrillas;
use App\Models\Clientes as ModelsClientes;
use Illuminate\Support\Facades\DB;

class PublicacionesController extends Controller
{

    public function index()
    {

        /* $clientes = ModelsClientes::where('idEstado', '=', 1)->get();
        $plataformas = ModelsPlataformas::where('idEstado', '=', 1)->get();
        return view('admin.clientes.plataformas.create', compact('plataformas','clientes')); */
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $parrilla = ModelsParrillas::find($id);
        if (!$parrilla) {
            // Maneja el caso en el que la parrilla no se encuentra
            // Puedes redirigir o mostrar un mensaje de error, como se muestra a continuación
            return redirect()->back()->with('error', 'Parrilla no encontrada');
        }

        $publicaciones = ModelsPublicaciones::where('idParrilla', $id)->get();
        //$publicaciones = ModelsPublicaciones::where('idParrilla', $id)->get();          
        //Obtén las listas necesarias para el formulario
       $tiposPrueba = [
            ['id' => 1, 'nombre' => 'Tipo 1'],
            ['id' => 2, 'nombre' => 'Tipo 2'],
            ['id' => 3, 'nombre' => 'Tipo 3'],
        ];

        $books[] = [
            'title' => 'Mytitle',
            'author' => 'MyAuthor',
            
        ];

        //pass data to other view
        return view('admin.parrillas.publicaciones.create')->with('books');

        //return view('myView.blade.php','books');

        //return view('myView.blade.php',compact('books'));

        //$tiposContenido = ModelsTipoContenido::all();        
        //var_dump($tiposContenido); die();
        $plataformas = ModelsPlataformas::where('idCliente', $id)->get();
        $cliente = ModelsClientes::where('idParrilla', '=', $id)->get();
 
        //Ahora, $parrilla, $publicaciones, $tiposContenido, $plataformas y $cliente contienen la información que necesitas en la vista
        return view('admin.parrillas.publicaciones.create', compact('parrilla', 'publicaciones', 'tiposContenido', 'plataformas', 'cliente'));
        //return view('admin.parrillas.publicaciones.create', compact('tiposPrueba'));
        return view('admin.parrillas.publicaciones.create')->with('tiposPrueba', $tiposPrueba);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        //dd('Llegué al método save');
        //insertar valores quemados
        
/*         $publicacion = new ModelsPublicaciones();

        // Asignar valores a las propiedades de la publicación
        $publicacion->fechaPublicacion = '2021-10-10';
        $publicacion->linkContenido = 'https://www.google.com';
        $publicacion->postCopyPublicacion = 'postCopyPublicacion';
        $publicacion->copyDiseno = 'copyDiseno';
        $publicacion->linkReferencia = 'https://www.google.com';
        $publicacion->linkDescargaRecursos = 'https://www.google.com';
        $publicacion->observaciones = 'observaciones';
        $publicacion->idParrilla = 1;
        $publicacion->idTipoContenido = 1;
        $publicacion->idEstado = 1;


        dd($publicacion);

        $publicacion->save();
        // Mostrar la publicación guardada
        //dd($publicacion);
        dd($publicacion->postCopyPublicacion); // Debería mostrar 'postCopyPublicacion' */


        // Valida los datos del formulario
        $request->validate([
            // Ajusta las reglas de validación según tus necesidades
            'fechaPublicacion' => 'required|date',
            'linkContenido' => 'required|url',
            'postCopyPublicacion' => 'required',
            'copyDiseno' => 'required',
            'linkReferencia' => 'required|url',
            'linkDescargaRecursos' => 'required|url',
            'observaciones' => 'required',
            'idParilla' => 'required|exists:parrillas,id',
            'idTipoContenido' => 'required|exists:tipos_contenido,id',
            'idEstado' => 'required|exists:estados,id',
            'plataformas' => 'required|array', // Asegura que la entrada para plataformas sea un array
            'plataformas.*' => 'exists:plataformas,id', // Asegura que cada plataforma exista en la tabla de plataformas
        ],
        [
            'estado.in' => 'El campo estado debe ser pendiente, publicado o en revision',
            'fechaPublicacion.required' => 'El campo fecha de publicación es obligatorio',
            'fechaPublicacion.date' => 'El campo fecha de publicación debe ser una fecha',
            'linkContenido.required' => 'El campo link de contenido es obligatorio',
            'linkContenido.url' => 'El campo link de contenido debe ser una URL',
            'postCopyPublicacion.required' => 'El campo post copy de publicación es obligatorio',
            'copyDiseno.required' => 'El campo copy de diseño es obligatorio',
            'linkReferencia.required' => 'El campo link de referencia es obligatorio',
            'linkReferencia.url' => 'El campo link de referencia debe ser una URL',
            'linkDescargaRecursos.required' => 'El campo link de descarga de recursos es obligatorio',
            'linkDescargaRecursos.url' => 'El campo link de descarga de recursos debe ser una URL',
            'observaciones.required' => 'El campo observaciones es obligatorio',
            'idParilla.required' => 'El campo parrilla es obligatorio',
            'idParilla.exists' => 'El campo parrilla debe ser un ID de parrilla válido',
            'idTipoContenido.required' => 'El campo tipo de contenido es obligatorio',
            'idTipoContenido.exists' => 'El campo tipo de contenido debe ser un ID de tipo de contenido válido',
            'idEstado.required' => 'El campo estado es obligatorio',
            'idEstado.exists' => 'El campo estado debe ser un ID de estado válido',
            'plataformas.required' => 'El campo plataformas es obligatorio',
            'plataformas.array' => 'El campo plataformas debe ser un array',
            'plataformas.*.exists' => 'El campo plataformas debe contener IDs de plataformas válidos',
            
        ]
    );

        dd($request->all());

        // Crea la publicación
        $publicacion = ModelsPublicaciones::create([
            'fechaPublicacion' => $request->fechaPublicacion,
            'linkContenido' => $request->linkContenido,
            'postCopyPublicacion' => $request->postCopyPublicacion,
            'copyDiseno' => $request->copyDiseno,
            'linkReferencia' => $request->linkReferencia,
            'linkDescargaRecursos' => $request->linkDescargaRecursos,
            'observaciones' => $request->observaciones,
            'idParilla' => $request->idParilla,
            'idTipoContenido' => $request->idTipoContenido,
            'idEstado' => $request->idEstado,
        ]);

        dd($publicacion);

        $datos = new ModelsPublicaciones();

        $datos->fechaPublicacion = $request->fechaPublicacion;
        $datos->linkContenido = $request->linkContenido;
        $datos->postCopyPublicacion = $request->postCopyPublicacion;
        $datos->copyDiseno = $request->copyDiseno;
        $datos->linkReferencia = $request->linkReferencia;
        $datos->linkDescargaRecursos = $request->linkDescargaRecursos;
        $datos->observaciones = $request->observaciones;
        $datos->idParrilla = $request->idParrilla;
        $datos->idTipoContenido = $request->idTipoContenido;
        $datos->idEstado = $request->idEstado;

        $datos->save();

        dd($datos);

        // Asocia las plataformas seleccionadas a la publicación
        $publicacion->plataformas()->attach($request->plataformas);

        // Redirige a donde sea necesario
        return redirect()->route('crearPublicacion', $request->idParrilla)->with('creado', 'ok');

    }


    /**
     * Display the specified resource.
     */
    public function show(ModelsPublicaciones $publicaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsPublicaciones $publicaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsPublicaciones $publicaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsPublicaciones $publicaciones)
    {
        //
    }
}
