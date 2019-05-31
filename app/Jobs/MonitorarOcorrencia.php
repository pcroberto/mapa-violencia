<?php

namespace App\Jobs;

use App\Model\Ocorrencia;
use App\Model\Radar;
use App\Mail\EnviarEmailRadar;
use Illuminate\Support\Facades\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

class MonitorarOcorrencia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $ocorrencia;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Ocorrencia $ocorrencia)
    {
        $this->ocorrencia = $ocorrencia;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $query = "select radares.id
                    from ocorrencias 
                         inner join localizacoes local_oco on ocorrencias.localizacao_id = local_oco.id, 
                         radares 
                         inner join localizacoes local_radar on radares.localizacao_id = local_radar.id 
                   where ocorrencias.id = {$this->ocorrencia->id}
                     and ST_Distance(local_oco.local, local_radar.local) <= radares.raio";

        $result = DB::select($query);

        foreach ($result as $value) {
            $radar = Radar::find($value->id);
            $crimes = $radar->crimes()->where('crimes.id', $this->ocorrencia->crime_id)->get();

            if ($crimes->count() == 0) {
                continue;
            }

            Mail::to($radar->user->email)->send(new EnviarEmailRadar($this->ocorrencia, $radar));
        }
    }
}
