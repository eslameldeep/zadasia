<?php

namespace App\View\Components\Echocloud;

use App\Domain\Station\Models\Device;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RealTimeSync extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Device $device , public $hours = 1  , public $functionName = 'renderPromiseReady')
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.echocloud.real-time-sync');
    }
}
