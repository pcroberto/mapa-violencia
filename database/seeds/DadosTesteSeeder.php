<?php

use Illuminate\Database\Seeder;

use App\Model\Cidade;
use App\Model\Estado;
use App\Model\Crime;
use App\Model\Localizacao;
use App\Model\Ocorrencia;
use App\Model\Radar;
use App\Model\Usuario;
use App\Model\Vitima;
use Phaza\LaravelPostgis\Geometries\Point;
use Illuminate\Support\Carbon;

class DadosTesteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crime::create(['descricao' => 'Homicídio']);
        Crime::create(['descricao' => 'Tentativa de homicídio']);
        Crime::create(['descricao' => 'Estupro']);
        Crime::create(['descricao' => 'Tentativa de Estupro']);
        Crime::create(['descricao' => 'Agressão física']);
        Crime::create(['descricao' => 'Assalto']);
        $crime = Crime::create(['descricao' => 'Tentativa de assaulto']);

        $estado = Estado::create(['nome' => 'Rio Grande do Sul', 'uf' => 'RS']);

        $cidade = new Cidade();
        $cidade->nome = "Porto Alegre";
        $cidade->estado()->associate($estado);
        $cidade->save();

        $localOcor = new Localizacao();
        $localOcor->endereco = "Av Ipiranga, 4568, Bairro Santana, 90040-150";
        $localOcor->cidade()->associate($cidade);
        $localOcor->local = new Point(-30.045085, -51.209167);
        $localOcor->save();

        $cidade = Cidade::find(1);
        $localRadar = new Localizacao();
        $localRadar->endereco = "Av Farrapos, 123, Bairro Floresta, 91055-060";
        $localRadar->cidade()->associate($cidade);
        $localRadar->local = new Point(-30.020990, -51.211083);
        $localRadar->save();

        $vitima = new Vitima();
        $vitima->sexo = "Masculino";
        $vitima->etnia = "Indígena";
        $vitima->data_nascimento = Carbon::today();
        $vitima->boletim = false;
        $vitima->save();

        $ocorrencia = new Ocorrencia();
        $ocorrencia->crime()->associate($crime);
        $ocorrencia->localizacao()->associate($localOcor);
        $ocorrencia->vitima()->associate($vitima);
        $ocorrencia->descricao = "Assaltado por dos lek";
        $ocorrencia->data = Carbon::today();
        $ocorrencia->hora = Carbon::now();
        $ocorrencia->save();
    }
}
