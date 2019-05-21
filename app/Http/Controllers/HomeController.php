<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cidade;
use App\Model\Estado;
use App\Model\Localizacao;
use App\Model\Ocorrencia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('cidade')) {
            $request->session()->forget('cidade');
        }

        $cidades = Cidade::with('Estado')->orderBy('cidades.nome')->get();
        
        foreach ($cidades as $cidade) {
            $cidade->nome = $cidade->nome . ' - ' . $cidade->estado->uf;
        }

        return view('home', ['cidades' => $cidades->pluck('nome', 'id')]);
    }

    public function all(Request $request)
    {
        $cidade = Cidade::with('Estado')->findOrFail($request->cidade);
        $request->session()->put('cidade', $cidade);

        $ocorrencias = Cidade::find($request->cidade)->ocorrencias()->with('Crime', 'Localizacao')->get();
        
        foreach($ocorrencias as $ocorrencia){
            $ocorrencia->datahora = date('d/m/Y H:i', strtotime($ocorrencia->datahora));
        }

        return view('mainmap', ['ocorrencias' => $ocorrencias]);
    }
}