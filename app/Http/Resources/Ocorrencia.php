<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Crime as CrimeResource;
use App\Model\Crime;
use App\Http\Resources\Localizacao as LocalizacaoResource;
use App\Model\Localizacao;
use App\Http\Resources\Vitima as VitimaResource;
use App\Model\Vitima;

class Ocorrencia extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "descricao" => $this->descricao,
            "datahora" => $this->datahora,
            "vitima" => new VitimaResource( Vitima::find($this->vitima_id)),
            "crime" => new CrimeResource( Crime::find($this->crime_id)),
            "localizacao" => new LocalizacaoResource( Localizacao::find($this->localizacao_id))
        ];
    }
}
