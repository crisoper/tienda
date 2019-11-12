<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $table = 'categorias';
    //Definimos el nombre la tabla = categorias


    //Productos de la categoria
    public function productos(){
    	return $this->hasMany('App\Producto', 'categoria_id');
    }

}
