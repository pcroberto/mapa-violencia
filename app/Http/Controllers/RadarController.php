<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Radar;
use App\Model\Crime;
use App\Model\Cidade;
use App\Model\Estado;
use App\Model\Localizacao;
use Phaza\LaravelPostgis\Geometries\Point;

class RadarController extends Controller
{
    const BRASIL = 'BRA';

    private $formMapRules = [
        'endereco' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'latitude' => 'required',
        'longitude' => 'required'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $radares = Radar::with('Localizacao')->where('user_id',\Auth::user()->id)->get();

        return view('radares', ['radares' => $radares]);
    }

    public function new(Request $request)
    {
        $crimes = Crime::all();
        return view('new-radar', ['crimes' => $crimes]);
    }

    public function save(Request $request)
    {
        $validate = validator($request->all(), $this->formMapRules);
        
        if ($validate->fails()) {
            \Session::flash('mensagem_erro', "Nenhuma localização foi marcada. Por favor, utilize o mapa abaixo para selecionar o endereço da ocorrência.");
            return \Redirect::route('novo.radar')->withInput();
        }

        if ($request->pais != self::BRASIL) {
            \Session::flash('mensagem_erro', "Não é permitido selecionar um endereço fora do território brasileiro.");
            return \Redirect::route('novo.radar')->withInput();
        }

        \DB::beginTransaction();

        $cidade = Cidade::where('nome', $request->cidade)->first();

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

        $radar = new Radar();
        $radar->nome = $request->nome;
        $radar->raio = $request->raio;
        $radar->localizacao()->associate($local);
        $radar->user()->associate(\Auth::user());
        $radar->save();
        $radar->crimes()->sync($request->crime);

        \DB::commit();

        return redirect()->route('listar.radar');
    }

    public function remover(Request $request)
    {
        $radar = Radar::find($request->id);
        $radar->crimes()->detach();
        $radar->delete();
        return redirect()->route('listar.radar');
    }
}