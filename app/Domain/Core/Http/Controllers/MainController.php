<?php

namespace App\Domain\Core\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class MainController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected string $name;

    protected string $path;

    protected string $model;

    protected string $datatable;

    protected string $formRequest;

    protected string $routes;
    
    protected array $permissions;
    
    protected array $routeList;
    protected array $exceptRouteList = [] ;

    protected string $primary_key ;

    protected array $routeParameters ;
    protected string $modelParameters  ;


    public function __construct()
    {
        
        if (isset($this->permissions)) {
            $this->permissions[0]::{$this->permissions[1]}()->resource($this);
        }
        if (!isset($this->primary_key)) {
            $this->primary_key = 'id' ; 
        }
        $this->modelParameters = $this->routeParameters[count($this->routeParameters)-1] ;
        if (isset($this->routes) && isset($this->model)) {
            // add sort route to model 
            $model = new ($this->model) ; 
            if ($model?->sortColumn != null){
                $this->routeList['sort'] = $this->getLink(class_basename($this->model) , 'sort') ;
            }
            $defaultRoutes = [
                'index'   => in_array('index' , $this->exceptRouteList) ? null : $this->getLink(class_basename($this->model) , 'index'),
                'edit'    => in_array('edit' , $this->exceptRouteList) ? null : fn($model) => $this->getRoute($model , 'edit'),
                'update'  => in_array('update' , $this->exceptRouteList) ? null : fn($model , array $additionalParameters = []) => $this->getRoute($model , 'update' , $additionalParameters ),
                'store'   => in_array('store' , $this->exceptRouteList) ? null : fn($model = null) => $this->getRoute($model , 'store'),
                'create'  => in_array('create' , $this->exceptRouteList) ? null : $this->getLink(class_basename($this->model) , 'create'),
                'destroy' => in_array('destroy' , $this->exceptRouteList) ? null :fn($model) => $this->getRoute($model , 'destroy'),
            ] ;
            $defaultRoutes = array_diff_key($defaultRoutes, array_flip($this->exceptRouteList));

            
            // end add sort route to model
            $this->routeList = [
                ... $this->routeList , 
                ...$defaultRoutes
            ];
        }
    }

    /**
     * @description List of rules to validate the incoming requests
     *
     * @return array
     */

     protected function getRoute($model,$method , array $additionalParameters = [])
     {
         $parameters = request()->route()->parameters() ;

        
            $modelParameters = [] ;
            foreach ($this->routeParameters as $key => $value) {
                if (($parameters[$value] ?? null) == null){
                  
                    if( $model?->{"$this->primary_key"} != null){
                        
                        $modelParameters[$value] = $model?->{"$this->primary_key"} ; 
                    }
                }else{
                    
                    $modelParameters[$value] = $parameters[$value] ?? null  ;
                } 
            }

           
            return route("{$this->routes}.{$method}", [...$modelParameters , ...$additionalParameters] ) ;
        
     }

     protected function getLink($model,$method , array $additionalParameters = [])
     {
       
            $parameters = request()->route()?->parameters() ;
            $modelParameters = [] ;
            foreach ($this->routeParameters as $key => $value) {
                if($value != $this->modelParameters){
                if (($parameters[$value] ?? null) == null){
                   
                    $modelParameters[$value] = $model ; 
                }else{
                    $modelParameters[$value] = $parameters[$value] ?? null  ;
                } 
            }
            }
            return route("{$this->routes}.{$method}", [...$modelParameters , ...$additionalParameters] ) ;
        
     }


    protected function rules()
    {
        return [];
    }

    public function successfulRequest(
        ?string $route = null,
        bool $asJson = false,
        array $params = [],
    ): RedirectResponse|JsonResponse {
        if ($asJson || request()->wantsJson()) {
            return response()->json([
                'status'  => true,
                'message' => __('Request executed successfully'),
            ]);
        }

        toastr()->success(__('Request executed successfully'), 'Congrats');
        return redirect($this->routeList['index']);
    }

    protected function validationAction(): array
    {
        return isset($this->formRequest) && class_exists($this->formRequest) ?
            app($this->formRequest)->validated() : request()->validate($this->rules());
    }

    protected function queryBuilder(): Builder
    {
        return ($this->model)::query();
    }

    protected function view(string $name, array $data = []): View
    {
        return view($this->viewPath() . ".$name", $data);
    }

    protected function viewPath()
    {
        return $this->path;
    }
}
