<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{

	//Nombre de la tabla
	protected $table = 'cargos';
	
	//Indicamos que no deseamos guardar la fecha de creacion y actualizacion
	public $timestamps = false;


	//Trabajadores asignados a un cargo
    public function trabajadores()
    {
        return $this->hasMany('App\Trabajador', 'cargo_id');
    }


}
