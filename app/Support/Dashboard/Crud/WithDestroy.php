<?php

namespace App\Support\Dashboard\Crud;

use Illuminate\Database\Eloquent\Model;

trait WithDestroy
{
    protected function destroyAction(Model $model)
    {   
        $model->delete();

        return null;
    }

    public function destroy($id)
    {
        $parameters = request()->route()->parameters() ;
        $modeParameterId = $parameters[$this->modelParameters];
        
        $model = ($this->model)::where($this->primary_key ?? 'id' , $modeParameterId)->firstOrFail();
        
        $action = $this->destroyAction($model);

        return $action ?? $this->successfulRequest(asJson: true);
    }
}
