<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmergencyCallReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $distressCall;

    public function __construct(DistressCall $distressCall)
    {
        $this->distressCall = $call;
    }

    public function build()
    {
        return $this->view('notificacion');
    }
}
