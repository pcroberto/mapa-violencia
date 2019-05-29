<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Radar;

class RadarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $radares = Radar::where('user_id',\Auth::user()->id)->get();

        return view('radares', ['radares' => $radares]);
    }

    public function new(Request $request)
    {
        
        //criar viu do formulário
    }
}