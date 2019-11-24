<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PersonaSeeder extends Seeder
{
    public function run()
    {
        DB::table('personas')->truncate();

        $apellidos = Array('CASAS', 'VILLANUEVA', 'FLORES', 'GARCIA', 'GOICOCHEA', 'LOPEZ');
        $nombres = Array('JULIO ', 'WALTER', 'JOSE', 'GILBERTO', 'JHONY', 'LUIS', 'HECTOR');

        for ($i=1; $i <= 55; $i++) { 
        	DB::table('personas')->insert([
                'dni' => str_pad($i, 8, "20000000", STR_PAD_LEFT),
	            'nombre' => $nombres[rand(0, 6)],
	            'paterno' => $apellidos[rand(0, 5)],
	            'materno' => $apellidos[rand(0, 5)],
                'direccion' => Str::random(15),
                'sexo' => 'M',
            ]);
        }
    }
}


