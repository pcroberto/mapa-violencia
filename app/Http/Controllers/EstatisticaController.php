<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Cidade;
use App\Model\Crime;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;

class EstatisticaController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('cidade')) {
            return redirect()->route('home');
        }

        return view('estatistica');
    }

    public function emitir(Request $request)
    {
        $crimes = new Collection();
        $cidade = $request->session()->get('cidade');

        $queryBuilder = Cidade::find($cidade->id)
                             ->ocorrencias()
                             ->with('Localizacao', 'Crime')
                             ->orderBy('datahora');

        if ($request->crime != null) {
            $queryBuilder = $queryBuilder->where('crime_id', $request->crime);
            $crimes->add(Crime::find($request->crime));
        } else {
            $crimes = Crime::all();
        }

        if ($request->data_inicio != null) {
            $queryBuilder = $queryBuilder->whereDate('datahora', '>=', $request->data_inicio);
        }

        if ($request->data_fim != null) {
            $queryBuilder = $queryBuilder->whereDate('datahora', '<=', $request->data_fim);
        }
        
        $ocorrencias = $queryBuilder->get();
        
        if ($request->tipo == 1) {
            return view('mapadecalor', ['ocorrencias' => $ocorrencias]);
        }

        $dataInicio = new Carbon(($request->data_inicio == null) ? $ocorrencias->first()->datahora : $request->data_inicio);
        $dataFim  = new Carbon(($request->data_fim == null) ? $ocorrencias->last()->datahora : $request->data_fim);
        $period = CarbonPeriod::create($dataInicio->format('Y-m') . '-01', '1 month', $dataFim->format('Y-m') . '-01');
        $meses = array();

        foreach ($period as $key => $date) {
            $meses[] = $date->format('m/Y');
        }

        $dados = array();

        foreach ($crimes as $crime) {
            foreach ($meses as $mes) {
                $dados[$crime->descricao][$mes] = 0;
            }
        }

        foreach ($ocorrencias as $ocorrencia) {
            $data = new Carbon($ocorrencia->datahora);

            $dados[$ocorrencia->crime->descricao][$data->format('m/Y')]++;
        }

        return view('chart', ['dados' => $dados, 'crimes' => $crimes, 'meses' => $meses]);
    }


}