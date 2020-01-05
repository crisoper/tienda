<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function nivel(){
        return $this->belongsTo('App\Nivelarea', 'nivele_id');
    }

    public function areas(){
        return $this->hasMany('App\Area', 'padre_id');
    }

    public function areapadre(){
        return $this->belongsTo('App\Area', 'padre_id');
    }

    public function subareas(){
        return $this->hasMany('App\Area', 'padre_id')->with('areas');
    }

}

