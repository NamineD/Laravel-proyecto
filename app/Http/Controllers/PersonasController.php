<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Consultar los datos de la BD
        $datos['persona']=Personas::paginate(10);

        return view('personas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Email'=>'required|email',
            'Telefono'=>'required|string|max:100',
        ];

        //Mensajes de error
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosPersonas = request()->all();
        $datosPersonas = request()->except('_token');

        Personas::insert($datosPersonas);

        //return response()->json($datosPersonas);
        return redirect('personas')->with('mensaje', 'Datos agregados con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //Recuperar los datos
        $persona=Personas::findOrFail($id);

        return view('personas.edit', compact('persona') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Email'=>'required|email',
            'Telefono'=>'required|string|max:100',
        ];

        //Mensajes de error
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //
        //Actualizar la informacion
        $datosPersonas = request()->except(['_token', '_method']);
        Personas::where('id', '=', $id)->update($datosPersonas);

        $persona=Personas::findOrFail($id);

        //return view('personas.edit', compact('persona') );
        return redirect('personas')->with('mensaje', 'Dato modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Personas::destroy($id);
        return redirect('personas')->with('mensaje', 'Dato eliminado');
    }
}
