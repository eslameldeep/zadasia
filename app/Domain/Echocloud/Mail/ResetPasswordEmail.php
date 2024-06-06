<?php

namespace App\Domain\Echocloud\Mail;

use App\Domain\Core\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{

    use Queueable, SerializesModels;
    // implements ShouldQueue
    public $user  ; 
    public $url  ;
     
    function __construct(User $user , $url )
    {
        $this->user = $user ;
        $this->url = $url ;
    }
    
    public function build()
    {
        $user = $this->user ; 
        $url = $this->url ; 
        return $this->view('echocloud.auth.reset-password-email' , compact('user' , 'url'))
                    ->subject('Resetting your password');
    }
}
