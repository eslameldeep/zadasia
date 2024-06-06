<?php
namespace App\Domain\Core\Traits;

trait InteractWithChat
{


    public function messagesTo()
    {
        return $this->hasMany('App\Models\ChMessage' , 'to_id'  , 'id');
    }


    public function messagesFrom()
    {
        return $this->hasMany('App\Models\ChMessage' , 'from_id'  , 'id');
    }


}
