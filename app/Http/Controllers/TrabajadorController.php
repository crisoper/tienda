<?php

namespace App\Http\Controllers;

use App\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{


    /**
     * El usaurio debe haber inciado sesion para acceder a los metodos del controlador
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadores = Trabajador::with(["area", "cargo"])->paginate(10);

        return view("trabajadores.index", compact("trabajadores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajador $trabajador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajador $trabajador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajador $trabajador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function delete(Trabajador $trabajador)
    {
        return redirect()->back()->with("info", "Registro eliminado");
    }
}
