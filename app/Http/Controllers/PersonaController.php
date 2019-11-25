<?php

namespace App\Http\Controllers;

use App\Persona;

use Illuminate\Http\Request;

use App\Http\Requests\PersonaCrearRequest;
use App\Http\Requests\PersonaActualizarRequest;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

//Trabajar con clases de excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class PersonaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }


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
                            ->orderBy( request('sort', 'id'), 'ASC' )
                            ->paginate(10);

            return view('personas.index', compact('personas') );
        }
        else
        {
            $personas = Persona::orderBy( request('sort', 'id'), 'ASC' )
                            ->paginate(10);
                            
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

        return redirect()
                ->route('personas.index')
                ->with('info', 'Datos registrados correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::findOrFail( $id );        
        return view("personas.show", compact("persona"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::findOrFail( $id );
        return view("personas.edit", compact("persona"));
    }
    
    public function subirfoto($id)
    {
        $persona = Persona::findOrFail( $id );        
        return view("personas.subirfoto", compact("persona"));
    }
    
    public function storesubirfoto(Request $request, $id)
    {
        $persona = Persona::findOrFail( $id );

        $foto = $request->file('foto');
        
        $nombre = $foto->getClientOriginalName(); //Obtiene el nombre origial del archivo
        $extension = $foto->getClientOriginalExtension();  //Obtiene extension del archivo
        //Generando un nombre unico para guardar
        $nommbrefoto = date('YmdHis')."." . strtolower( $extension );
        //Guardando datos en el disco tienda
        \Storage::disk('tienda')->put($nommbrefoto,  \File::get($foto));
        
        $persona->foto = $nommbrefoto;
        $persona->save();

        return redirect()->route('personas.index')->with('info', 'Datos actualizados');
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

        // return redirect()->route('personas.index');


        return redirect()
                    ->route('personas.index')
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

        // return redirect()->route('personas.index');

        return redirect()
                    ->route('personas.index')
                    ->with('info', 'Registro eliminado');

    }



    public function dbraw() {
        $dni = '44641743';
        $buscar = 'A';
        $personas = DB::select("SELECT * FROM personas WHERE dni = ? OR paterno LIKE '%?%' ", [$dni, $buscar]);
        return $personas;
    } 


    public function dbinsert() {
        $nombre = "Nueva Categoria".rand(1, 12500);
        $descripcion = "Descripcion de la categoria";
        $categoria = DB::insert("INSERT INTO categorias (nombre, descripcion) values (?, ?)", [$nombre, $descripcion]);
        
        if ( $categoria ) {
            return "Se ha registrrado la categoria";
        }
        else {
            return "No se registraron los datos";
        }
    } 


    public function dbupdate() {
        $id = 6;
        $nombre = 'Nuevo nombre de categoria';
        $categoria = DB::update("UPDATE categorias SET nombre = ? WHERE id = ?", [$nombre, $id]);
        
        if ( $categoria ) {
            return "Se actualizo la categoria";
        }
        else {
            return "No actualizo el registro";
        }
    } 


    public function dbdelete() {
        $id = 4;
        $categoria = DB::delete("DELETE FROM categorias WHERE id = ?", [$id]);
        
        if ( $categoria ) {
            return "Se ha eliminado la categoria";
        }
        else {
            return "No se ha eliminado el registro";
        }
    } 

    public function exportar() 
    {
        $buscar = request('buscar_exportar', null);
        if( $buscar != null ) 
        {
            $personas = Persona::where('nombre', 'like', '%'.$buscar.'%')
                            ->orWhere('paterno', 'like', '%'.$buscar.'%')
                            ->orWhere('materno', 'like', '%'.$buscar.'%')
                            ->orWhere('dni', '=', request()->$buscar)
                            ->get();
        }
        else
        {
            $personas = Persona::get();
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $contador = 0;        
        $contador++;
        $sheet->setCellValue('A'.$contador, 'Nro' );
        $sheet->setCellValue('B'.$contador, 'DNI' );
        $sheet->setCellValue('C'.$contador, 'PATERNO' );
        $sheet->setCellValue('D'.$contador, 'MATERNO' );
        $sheet->setCellValue('E'.$contador, 'NOMBREE' );

        foreach($personas as $persona) {
            $contador++;
            $sheet->setCellValue('A'.$contador, $contador - 1 );
            $sheet->setCellValue('B'.$contador, $persona->dni );
            $sheet->setCellValue('C'.$contador, $persona->paterno );
            $sheet->setCellValue('D'.$contador, $persona->materno );
            $sheet->setCellValue('E'.$contador, $persona->nombre );
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.date('YmdHis').'.xlsx"');
        header('Cache-Control: max-age=0');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        
        $writer->save('php://output');
        exit();
    }



    public function imprimirpdf() {

        $buscar = request('buscar_exportar', null);
        
        if( $buscar != null )  {
            $personas = Persona::where('nombre', 'like', '%'.$buscar.'%')
                            ->orWhere('paterno', 'like', '%'.$buscar.'%')
                            ->orWhere('materno', 'like', '%'.$buscar.'%')
                            ->orWhere('dni', '=', request()->$buscar)
                            ->get();
        }
        else {
            $personas = Persona::get();
        }

        $pdf = \PDF::loadView(
                                'pdf.personas.lista',
                                [ 
                                    'personas' => $personas, 
                                    'cantidad' => $personas->count() 
                                ]
                            );

        return $pdf->download(date('YmdHis').'.pdf');
    }

}
