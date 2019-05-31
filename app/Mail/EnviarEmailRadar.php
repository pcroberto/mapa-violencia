<?php

namespace App\Mail;

use App\Mail\EnviarEmailRadar;
use Illuminate\Support\Facades\Mail;
use App\Model\Ocorrencia;
use App\Model\Radar;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmailRadar extends Mailable
{
    use Queueable, SerializesModels;

    private $ocorrencia;    
    private $radar;        

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ocorrencia $ocorrencia, Radar $radar)
    {
        $this->ocorrencia = $ocorrencia;
        $this->radar = $radar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->radar->user->email)
                    ->subject("Alerta de ocorrência!")
                    ->view('emails.radar')
                    ->with([
                        'radar' => $this->radar,
                        'ocorrencia' => $this->ocorrencia
                    ]);
    }
}
