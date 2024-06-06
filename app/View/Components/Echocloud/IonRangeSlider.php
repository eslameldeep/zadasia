<?php

namespace App\View\Components\Echocloud;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class IonRangeSlider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $rangeId = 'js-range-slider',
        public string $skin = 'round',
        public string|null $min = '',
        public string|null $max = '',
        public string|null $from = '',
        public string|null $to = '' , 
        public $functionName = 'renderPromiseReady'
    ) {
        $now = Carbon::now();
        $defaultMax = $now->copy()->addDay()->format('Y-m-d H:i:s');
        $this->min = $min ?: $now->format('Y-m-d H:i:s');
        $this->max = $max ? Carbon::parse($max)->max($defaultMax)->format('Y-m-d H:i:s') : $defaultMax;
        $this->from = $from ?: $now->format('Y-m-d H:i:s');
        $this->to = $to ?: $now->copy()->addDay()->format('Y-m-d H:i:s');
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.echocloud.ion-range-slider');
    }
}
