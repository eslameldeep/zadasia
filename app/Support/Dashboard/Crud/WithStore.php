<?php

namespace App\Support\Dashboard\Crud;

use Illuminate\Support\Arr;

trait WithStore
{
    protected function storeAction(array $validated)
    {   
        $mediaField = $this?->mediaField  ?? [] ; 
        foreach ($mediaField as $Field) {
            $$Field = Arr::pull($validated, $Field );    
            ${"old_".$Field} = Arr::pull($validated, "old_".$Field );    

        }
        
        if((new ($this->model))->statusColumn  != null) {
            
            $validated['status'] = request('status') == true ? 1 : 0 ; 
        }
        
        $model = ($this->model)::create($validated);

        foreach ($mediaField as $Field) {
            $this->storeMediaCSV( $$Field , $model , $Field);
        }
        return null;
    }

    public function store()
    {
        $validated = $this->validationAction();

        $action = $this->storeAction($validated);

        return $action ?? $this->successfulRequest();
    }
}
