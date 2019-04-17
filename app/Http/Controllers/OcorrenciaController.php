<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Crime;
use App\Model\Ocorrencia;
use Illuminate\Support\Carbon;

class OcorrenciaController extends Controller
{
    public function index()
    {
        return view('new', ['crimes' => Crime::all()]);
    }

    public function all()
    {
        $ocorrencias = Ocorrencia::with(['localizacao', 'crime'])->get();

        foreach($ocorrencias as $ocorrencia){
            $ocorrencia->datahora = date('d/m/Y H:i', strtotime($ocorrencia->datahora));
        }
        return view('home', ['ocorrencias' => $ocorrencias]);
    }
}
