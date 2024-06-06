<?php

namespace App\View\Components\Echocloud;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlotlyLineChart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $chartId,
        public string $chartTitle,
        public string $chartType = "line",
        public string $chartGroup = "page",
        public array $chartOptions = [],
        public bool $chartMultiAxis = false,
        public array $keys = [] , 
        public $sensors = null ,
        public $functionName = 'renderPromiseReady'
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.echocloud.plotly-line-chart');
    }
}
