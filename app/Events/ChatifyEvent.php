<?php

namespace App\Events;

use App\Domain\Core\Models\User;
use App\Models\ChMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ChatifyEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    
    public $user ; 
    public $message  ;
    
    public function __construct($user, $message){    

        
    $this->user = $user;
        
    $this->message = $message;
        
    Log::debug("event fires") ; 

    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn() :Array
    {
        return [new PrivateChannel('private-chatify.'.$this->message->to_id)];
    }


    
    
}
