<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Tarefa;

class NovaTarefaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tarefa;
    public $completion_date;
    public $url;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa->tarefa;
        $this->completion_date = date('d/m/Y', strtotime($tarefa->completion_date));
        $this->url = 'http://localhost:8000/tarefa/'.$tarefa->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.nova-tarefa')
        ->subject("New Task: {$this->tarefa}");
    }
}
