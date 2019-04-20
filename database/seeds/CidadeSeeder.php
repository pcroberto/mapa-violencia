<?php

use Illuminate\Database\Seeder;

use App\Model\Estado;
use App\Model\Cidade;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = Estado::create(['nome' => 'Rio Grande do Sul', 'uf' => 'RS']);
        $cidade = new Cidade();
        $cidade->nome = "Porto Alegre";
        $cidade->estado()->associate($estado);
        $cidade->save();
    }
}
