<?php

namespace App\Http\Controllers;

use App\Persona;

use Illuminate\Http\Request;

use App\Http\Requests\PersonaCrearRequest;
use App\Http\Requests\PersonaActualizarRequest;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty(request()->buscar)) 
        {
            $personas = Persona::where('nombre', 'like', '%'.request()->buscar.'%')
                            ->orWhere('paterno', 'like', '%'.request()->buscar.'%')
                            ->orWhere('materno', 'like', '%'.request()->buscar.'%')
                            ->orWhere('dni', '=', request()->buscar)
                            ->orderBy( 'created_at', request('sorted', 'DESC') )
                            ->get();

            return view('personas.index', compact('personas') );
        }
        else
        {
            $personas = Persona::orderBy( 'created_at', request('sorted', 'DESC') )
                            ->get();
                            
            return view('personas.index', compact('personas') );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("personas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaCrearRequest $request)
    {
        $persona = new Persona;
        $persona->dni = $request->input('dni');
        $persona->paterno = $request->input('paterno');
        $persona->materno = $request->input('materno');
        $persona->nombre = $request->input('nombre');
        $persona->sexo = $request->input('sexo');
        $persona->direccion = $request->input('direccion');
        $persona->correo = $request->input('correo');
        $persona->celular = $request->input('celular');
        $persona->fechanacimiento = $request->input('fechanacimiento');
        
        $persona->save();

        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view("personas.edit", compact("persona"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaActualizarRequest $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->nombre = $request->input("nombre");
        $persona->paterno = $request->input("paterno");
        $persona->materno = $request->input("materno");
        $persona->dni = $request->input("dni");
        $persona->sexo = $request->input("sexo");
        $persona->fechanacimiento = $request->input('fechanacimiento');;
        $persona->correo = $request->input("correo");
        $persona->direccion = $request->input("direccion");
        $persona->celular = $request->input("celular");
        $persona->save();

        return redirect()->route('personas.index')
                        ->with('info', 'Datos actualizados correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete(); 

        return redirect()->route('personas.index')
                        ->with('info', 'Datos actualizados correctamente');

    }
}
