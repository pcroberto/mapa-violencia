<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Crime;
use App\Model\Ocorrencia;

class OcorrenciaController extends Controller
{
    public function index()
    {
        return view('new', ['crimes' => Crime::all()]);
    }

    public function all()
    {
        return view('home', ['ocorrencias' => Ocorrencia::all()]);
    }
}
