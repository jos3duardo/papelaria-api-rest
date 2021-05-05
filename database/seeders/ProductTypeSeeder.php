<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name'=> 'Agenda e Calendarios'],
            ['name'=> 'Cadernos'],
            ['name'=> 'Papeis'],
            ['name'=> 'Canetas e Canetinhas'],
            ['name'=> 'Calculadoras'],
            ['name'=> 'Borrachas'],
            ['name'=> 'Chaveiros'],
            ['name'=> 'Jogos'],
        ];

        DB::table('product_types')->insert($data);
    }
}
