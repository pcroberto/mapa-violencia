<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Cidade as CidadeResource;
use App\Model\Cidade;

class Localizacao extends JsonResource
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
            "endereco" => $this->endereco,
            "local" => $this->local,
            "cidade" => new CidadeResource( Cidade::find($this->cidade_id) )
        ];
    }
}
