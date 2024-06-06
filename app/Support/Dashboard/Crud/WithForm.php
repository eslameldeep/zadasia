<?php

namespace App\Support\Dashboard\Crud;

use Collective\Html\FormFacade;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait WithForm
{
    public function create(): View
    {
        return $this->formPage();
    }

    public function edit($id)
    {
        
        $parameters = request()->route()->parameters() ;
        $modeParameterId = $parameters[$this->modelParameters];
       
        $model = ($this->model)::where($this->primary_key ?? 'id' , $modeParameterId)->firstOrFail();
        
        return $this->formPage(model: $model);
    }

    public function formPage(array $data = [], ?Model $model = null): View
    {
        
        
        $model && FormFacade::setModel($model);
        $data['model'] = $model;
        
        $data['routeList'] = $this->routeList ;
        $data['name'] = $this->name ;
        return view("{$this->viewPath()}.form", array_merge($this->formData($model), $data));
    }

    protected function formData(?Model $model = null): array
    {
        return [];
    }
}
