<?php

namespace App\Domain\Echocloud\Mail;

use App\Domain\Core\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResendVerifyEmail extends Mailable
{

    use Queueable, SerializesModels;
    // implements ShouldQueue
    public $user  ; 
    function __construct(User $user)
    {
        $this->user = $user ;
    }
    
    public function build()
    {
        $user = $this->user ; 
        return $this->view('echocloud.auth.resend-verify-email' , compact('user'))
                    ->subject('Resend Verify Email');
    }
}
