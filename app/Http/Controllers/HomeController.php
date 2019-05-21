<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cidade;
use App\Model\Estado;
use App\Model\Localizacao;
use App\Model\Ocorrencia;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::with('Estado')->orderBy('cidades.nome')->get();
        
        foreach ($cidades as $cidade) {
            $cidade->nome = $cidade->nome . ' - ' . $cidade->estado->uf;
        }

        return view('home', ['cidades' => $cidades->pluck('nome', 'id')]);
    }

    public function all(Request $request)
    {
        $ocorrencias = Cidade::find($request->cidade)->ocorrencias()->with('Crime', 'Localizacao')->get();
        
        foreach($ocorrencias as $ocorrencia){
            $ocorrencia->datahora = date('d/m/Y H:i', strtotime($ocorrencia->datahora));
        }

        // dd($ocorrencias);

        return view('mainmap', ['ocorrencias' => $ocorrencias]);
    }
}