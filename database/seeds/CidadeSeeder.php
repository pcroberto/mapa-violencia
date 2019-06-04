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
        $estado = Estado::create(['nome' => 'Rondônia', 'uf' => 'RO']);
        $estado = Estado::create(['nome' => 'Acre', 'uf' => 'AC']);
        $estado = Estado::create(['nome' => 'Amazonas', 'uf' => 'AM']);
        $estado = Estado::create(['nome' => 'Roraima', 'uf' => 'RR']);
        $estado = Estado::create(['nome' => 'Pará', 'uf' => 'PA']);
        $estado = Estado::create(['nome' => 'Amapá', 'uf' => 'AP']);
        $estado = Estado::create(['nome' => 'Tocantins', 'uf' => 'TO']);
        $estado = Estado::create(['nome' => 'Maranhão', 'uf' => 'MA']);
        $estado = Estado::create(['nome' => 'Piauí', 'uf' => 'PI']);
        $estado = Estado::create(['nome' => 'Ceará', 'uf' => 'CE']);
        $estado = Estado::create(['nome' => 'Rio Grande do Norte', 'uf' => 'RN']);
        $estado = Estado::create(['nome' => 'Paraíba', 'uf' => 'PB']);
        $estado = Estado::create(['nome' => 'Pernambuco', 'uf' => 'PE']);
        $estado = Estado::create(['nome' => 'Alagoas', 'uf' => 'AL']);
        $estado = Estado::create(['nome' => 'Sergipe', 'uf' => 'SE']);
        $estado = Estado::create(['nome' => 'Bahia', 'uf' => 'BA']);
        $estado = Estado::create(['nome' => 'Minas Gerais', 'uf' => 'MG']);
        $estado = Estado::create(['nome' => 'Espírito Santo', 'uf' => 'ES']);
        $estado = Estado::create(['nome' => 'Rio de Janeiro', 'uf' => 'RJ']);
        $estado = Estado::create(['nome' => 'São Paulo', 'uf' => 'SP']);
        $estado = Estado::create(['nome' => 'Paraná', 'uf' => 'PR']);
        $estado = Estado::create(['nome' => 'Santa Catarina', 'uf' => 'SC']);
        $estado = Estado::create(['nome' => 'Rio Grande do Sul', 'uf' => 'RS']);
        $estado = Estado::create(['nome' => 'Mato Grosso do Sul', 'uf' => 'MS']);
        $estado = Estado::create(['nome' => 'Mato Grosso', 'uf' => 'MT']);
        $estado = Estado::create(['nome' => 'Goiás', 'uf' => 'GO']);
        $estado = Estado::create(['nome' => 'Distrito Federal', 'uf' => 'DF']);

    }
}
