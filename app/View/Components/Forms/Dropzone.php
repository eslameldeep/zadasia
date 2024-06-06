<?php

namespace App\View\Components\Forms;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;


class Dropzone extends Component
{
    /**
     * The placeholder for the input file box.
     *
     * @var string
     */
    public $placeholder;

    /**
     * A legend for the replacement of the default 'Browser' text.
     *
     * @var string
     */
    public $legend;
    

    public $types;
   
    public $maxFileSizeMb;

    public $maxFiles;
    
    public $mediaFiles;


    /**
     * Create a new component instance.
     * Note this component requires the 'bs-custom-input-file' plugin.
     *
     * @return void
     */
    public function __construct(
        public string $name , public string $id , public Arr $value , $label = null, $igroupSize = null, $labelClass = null,
        $fgroupClass = null, $igroupClass = null, $disableFeedback = null,
        $errorKey = null, $placeholder = '', $legend = null  , $types = '.png, .jpg, .jpeg, .gif' , 
        $maxFileSizeMb = '1' , $maxFiles= '1' , $mediaFiles = null
        ) {
       
        
        $this->legend = $legend;
        $this->placeholder = $placeholder;
        $this->types = $types;
        $this->maxFileSizeMb = $maxFileSizeMb;
        $this->maxFiles = $maxFiles;
        $this->mediaFiles = $mediaFiles;

        
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(): View|Closure|string
    {
        return view('adminlte::components.form.dropzone');
    }
}
