<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Crime;
use App\Model\Cidade;
use App\Model\Estado;
use App\Model\Ocorrencia;
use App\Model\Localizacao;
use App\Model\Vitima;
use Illuminate\Support\Carbon;
use Phaza\LaravelPostgis\Geometries\Point;

class OcorrenciaController extends Controller
{
    public function all()
    {
        $ocorrencias = Ocorrencia::with(['localizacao', 'crime'])->get();

        foreach($ocorrencias as $ocorrencia){
            $ocorrencia->datahora = date('d/m/Y H:i', strtotime($ocorrencia->datahora));
        }
        return view('home', ['ocorrencias' => $ocorrencias]);
    }

    public function save(Request $request)
    {
        \DB::beginTransaction();

        $parametros = $request->all();
        $cidade = Cidade::where('nome', $parametros['cidade'])->first();
        $crime = Crime::find($parametros['crime']);

        if (is_null($cidade)) {
            $estado = Estado::where('nome', $parametros['estado'])->first();

            $cidade = new Cidade();
            $cidade->nome = $parametros['cidade'];
            $cidade->estado()->associate($estado);
            $cidade->save();
        }

        $local = new Localizacao();
        $local->endereco = $parametros['endereco'];
        $local->cidade()->associate($cidade);
        $local->local = new Point((float) $parametros['latitude'], (float) $parametros['longitude']);
        $local->save();

        $vitima = new Vitima();
        $vitima->sexo = $parametros['sexo'];
        $vitima->etnia = $parametros['etnia'];
        $vitima->data_nascimento = Carbon::create($parametros['dataNasicmento']);
        $vitima->boletim = $parametros['boletim'] == "1" ? true : false;
        $vitima->save();

        $ocorrencia = new Ocorrencia();
        $ocorrencia->crime()->associate($crime);
        $ocorrencia->localizacao()->associate($local);
        $ocorrencia->vitima()->associate($vitima);
        $ocorrencia->descricao = $parametros['descricao'];
        $ocorrencia->datahora = Carbon::create($parametros['data'] . " " . $parametros['hora']);
        $ocorrencia->save();

        \DB::commit();
    }
}
