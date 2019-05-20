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
    const BRASIL = 'BRA';

    private $formMapRules = [
        'endereco' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'latitude' => 'required',
        'longitude' => 'required'
    ];

    public function save(Request $request)
    {
        $validate = validator($request->all(), $this->formMapRules);
        
        if ($validate->fails()) {
            \Session::flash('mensagem_erro', "Nenhuma localização foi marcada. Por favor, utilize o mapa abaixo para selecionar o endereço da ocorrência.");
            return \Redirect::route('new.ocorrencia')->withInput();
        }

        if ($request->pais != self::BRASIL) {
            \Session::flash('mensagem_erro', "Não é permitido selecionar um endereço fora do território brasileiro.");
            return \Redirect::route('new.ocorrencia')->withInput();
        }

        \DB::beginTransaction();

        $cidade = Cidade::where('nome', $request->cidade)->first();
        $crime = Crime::find($request->crime);

        if (is_null($cidade)) {
            $estado = Estado::where('nome', $request->estado)->first();

            $cidade = new Cidade();
            $cidade->nome = $request->cidade;
            $cidade->estado()->associate($estado);
            $cidade->save();
        }

        $local = new Localizacao();
        $local->endereco = $request->endereco;
        $local->cidade()->associate($cidade);
        $local->local = new Point((float) $request->latitude, (float) $request->longitude);
        $local->save();

        $vitima = new Vitima();
        $vitima->nome = $request->nome_vitima;
        $vitima->idade = $request->idade;
        $vitima->email = $request->email;
        $vitima->sexo = $request->sexo;
        $vitima->etnia = $request->etnia;
        $vitima->boletim = $request->boletim == "1" ? true : false;
        $vitima->save();

        $ocorrencia = new Ocorrencia();
        $ocorrencia->crime()->associate($crime);
        $ocorrencia->localizacao()->associate($local);
        $ocorrencia->vitima()->associate($vitima);
        $ocorrencia->descricao = $request->descricao;
        $ocorrencia->datahora = Carbon::create($request->data . " " . $request->hora);
        $ocorrencia->save();

        \DB::commit();

        \Session::flash('mensagem_sucesso', "Ocorrência cadastrada com sucesso.");

        return \Redirect::route('new.ocorrencia');
    }
}
