<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cidadePresidentePrudente = Cidade::where('nome', 'Presidente Prudente')->first();
        $cidadeSaoPaulo = Cidade::where('nome', 'São Paulo')->first();
        $cidadeBeloHorizonte = Cidade::where('nome', 'Belo Horizonte')->first();

        Cliente::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'telefone' => '123456789',
            'cidade_id' => $cidadePresidentePrudente->id,
        ]);

        Cliente::create([
            'nome' => 'Andrey Patricio',
            'email' => 'andrey.patricio@example.com',
            'telefone' => '987654321',
            'cidade_id' => $cidadeSaoPaulo->id,
        ]);

        Cliente::create([
            'nome' => 'Lucas Reis',
            'email' => 'lucas.reis@example.com',
            'telefone' => '567894321',
            'cidade_id' => $cidadeSaoPaulo->id,
        ]);

        Cliente::create([
            'nome' => 'Alex B',
            'email' => 'alex.b@example.com',
            'telefone' => '432156789',
            'cidade_id' => $cidadeBeloHorizonte->id,
        ]);
    }
}
