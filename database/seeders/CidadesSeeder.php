<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cidade::create(['nome' => 'Presidente Prudente', 'estado' => 'SP']);
        Cidade::create(['nome' => 'São Paulo', 'estado' => 'SP']);
        Cidade::create(['nome' => 'Belo Horizonte', 'estado' => 'MG']);
    }
}
