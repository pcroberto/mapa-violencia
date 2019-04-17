<?php

use Illuminate\Database\Seeder;
use App\Model\Ocorrencia;
use App\Model\Crime;
use App\Model\Vitima;
use App\Model\Localizacao;
use App\Model\Cidade;
use Phaza\LaravelPostgis\Geometries\Point;
use Illuminate\Support\Carbon;

class OcorrenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $cidade = Cidade::find(1);
        $crime = Crime::find(3);
        $vitima = Vitima::find(1);

        $localOcor = new Localizacao();
        $localOcor->endereco = "Av Protásio Alves, 4568, Bairro Petrópolis, 90040-150";
        $localOcor->cidade()->associate($cidade);
        $localOcor->local = new Point(-30.038779, -51.202106);
        $localOcor->save();

        $ocorrencia = new Ocorrencia();
        $ocorrencia->crime()->associate($crime);
        $ocorrencia->localizacao()->associate($localOcor);
        $ocorrencia->vitima()->associate($vitima);
        $ocorrencia->descricao = "Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek Assaltado por dos lek ";
        $ocorrencia->datahora = Carbon::now();
        $ocorrencia->save();

        DB::commit();
    }
}
