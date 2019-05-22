<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cidade;

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
        $cidade = $request->session()->get('cidade');

        $queryBuilder = Cidade::find($cidade->id)
                             ->ocorrencias()
                             ->with('Localizacao');
        if ($request->crime != null) {
            $queryBuilder = $queryBuilder->where('crime_id', $request->crime);
        }

        if ($request->data_inicio != null) {
            $queryBuilder = $queryBuilder->whereDate('datahora', '>=', $request->data_inicio);
        }

        if ($request->data_fim != null) {
            $queryBuilder = $queryBuilder->whereDate('datahora', '<=', $request->data_fim);
        }
        
        $ocorrencias = $queryBuilder->get();

        // if ($request->tipo = 1) {
            return view('mapadecalor', ['ocorrencias' => $ocorrencias]);
        // }else {
        //     return view('grafico', ['ocorrencias' => $ocorrencias]);
        // }
    }
}