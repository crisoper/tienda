<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    
    //Categoria a la que pertenece el productos
    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }


}
