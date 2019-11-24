<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function save(Request $request)
    {

        $file = $request->file('file');
        
        $nombre = $file->getClientOriginalName(); //Obtiene el nombre origial del archivo
        $extension = $file->getClientOriginalExtension();  //Obtiene extension del archivo
        
        //Generando un nombre unico para guardar
        $nombre2 = date('YmdHis')."." . strtolower( $extension );
        
        //Guardando datos en el disco tienda
        \Storage::disk('tienda')->put($nombre2,  \File::get($file));
        
        return response()->json(['success' => $nombre2], 200);

    }
}
