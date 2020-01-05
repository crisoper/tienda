<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
	protected $table = 'trabajadores';

    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'cargo_id');
    }

    public function area()
    {
        return $this->belongsTo('App\Area', 'area_id');
    }

    public function usercreador()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function useractualizador()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

}

