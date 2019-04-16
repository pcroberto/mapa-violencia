<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Crime;

class OcorrenciaController extends Controller
{
    public function index()
    {
        return view('new', ['crimes' => Crime::all()]);
    }
}
