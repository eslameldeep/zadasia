<?php

namespace App\Support\Dashboard\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

trait WithUpdate
{
    protected function updateAction(array $validated, Model $model)
    {
        $mediaField = $this?->mediaField  ?? [] ; 
        foreach ($mediaField as $Field) {
            $$Field = Arr::pull($validated, $Field );
                
            ${"old_".$Field} = Arr::pull($validated, "old_".$Field );    

    
        }   
        
        if($model->statusColumn != null){

            $validated['status'] = request('status') == true ? 1 : 0 ; 
        }
           
        $model->update($validated);
        foreach ($mediaField as $Field) {
            
            $this->updateMediaCSV( $$Field , ${"old_".$Field} ,$model , $Field);
        }

        return null;
    }

    public function update($id)
    {
         
        // $this->routeList['edit'] = route($this->route.'.edit' , [$id]); 
        $parameters = request()->route()->parameters() ;
        $modeParameterId = $parameters[$this->modelParameters];
        
        $model = ($this->model)::findOrFail($modeParameterId);

        if (request()->ajax() && request()->updateStatus == 1) {
            return $this->updateStatusWithAjax($model, request()->status);
        }
        $validated = $this->validationAction();

        $action = $this->updateAction($validated, $model);

        return $action ?? $this->successfulRequest();
    }


    public function updateStatusWithAjax($model, $status)
    {
        if($model?->statusColumn == null){
            return response()->json([
                'success' => false,
                'message' => __("Model :model dosen't have status column" , ['model' => class_basename($model)]),
                'errors' => __('Error'),
            ], 422);
        }
        // Validate the input
        $validator = Validator::make(
            ['status' => $status],
            ['status' => 'required|boolean']
        );

        if ($validator->fails()) {
            // Return the validation error response
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        // Update the model status
        $model->update([$model->statusColumn => $status == true ? 1 : 0 ]);
        

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => __('Status updated successfully'),
            'status' => $model->status,
        ]);
    }


    public function updateOrder(Request $request)
    {
        $Models = ($this->model)::get();


        foreach ($Models as $model) {
            $model->timestamps = false; // To disable update_at field updation
            $id = $model->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $model->update([$model->sortColumn => $order['position']]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => __('Status updated successfully'),
            'status' => $model->status,
        ]);
    }
}
