<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Evento;
use Illuminate\Support\Facades\Mail;
class SendEmailEvento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:evento';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de email para lembrar o usuário de algum evento!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


      $vetor = [
        'nome' => 'prova',
        'data'=>'10/10/10',
        'mensagem' => "Que pena! Você atingiu  faltas! Assim, você foi reprovado por falta =/ . ",

      ];
        Mail::send('email_evento', $vetor, function($message) {
           $message->to('controlcollege@gmail.com', 'Usuário CC')->subject
            ('Contato Control College');
         $message->from('controlcollege@gmail.com','Control College');
      });
    }
}
