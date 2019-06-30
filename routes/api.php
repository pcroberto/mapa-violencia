<?php

use Illuminate\Http\Request;
use App\Model\Ocorrencia;
use App\Model\Cidade;
use App\Model\Crime;
use App\Http\Resources\Ocorrencia as OcorrenciaResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/ocorrencia', function () {
    return OcorrenciaResource::collection(Ocorrencia::all());
});

Route::get('/ocorrencia/cidade/{cidade}', function ($cidade) {
    foreach(Cidade::where('nome', $cidade)->get() as $cidadeModel){
        return OcorrenciaResource::collection($cidadeModel->ocorrencias()->get());
    }
});

Route::get('/ocorrencia/crime/{crime}', function ($crime) {
    return OcorrenciaResource::collection(Ocorrencia::where('crime_id', $crime)->get());
});

Route::get('/ocorrencia/cidade/{cidade}/crime/{crime}', function ($cidade, $crime) {
    foreach(Cidade::where('nome', $cidade)->get() as $cidadeModel){
        return OcorrenciaResource::collection($cidadeModel->ocorrencias()->where('crime_id', $crime)->get());
    }
});
