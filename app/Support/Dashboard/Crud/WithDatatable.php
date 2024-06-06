<?php

namespace App\Support\Dashboard\Crud;

use App\Support\Dashboard\Datatables\BaseDatatable ;
use Illuminate\Support\Str;

trait WithDatatable
{
    public function index()
    {
        // $this->routeList['create'] = route($this->path.'.create');

        return $this->datatablePage($this->getDatatable());
    }

    protected function datatablePage(BaseDatatable $datatable, array $data = [])
    {
        $data = array_merge([
            'routeList'      => $this->routeList ,
            'name'           => $this->name,
            'pagePermission' => $datatable->permission,
        ], $data);

        return $datatable->render($this->viewPath().'.index', $data);
    }

    protected function getDatatable($path = null, ?PermissionEnum $permissions = null): BaseDatatable
    {
        $path ??= $this->path;
        $routeList ??=  $this->routeList   ;
        if (isset($this->permissions) && ! $permissions) {
            $permissions = $this->permissions[0]::{$this->permissions[1]}();
        }
        if (isset($this->datatable)) {
            return $this->datatable::create($path, [], $permissions , $routeList);
        }

        $files = Str::of($this->model)
                    ->replaceFirst('Models', 'Datatables')
                    ->explode('\\');
        $class = $files->push($files->pop().'Datatable')->implode('\\');
        
        return $class::create($path, [], $permissions);
    }

    protected function viewPath()
    {
        return $this->path;
    }


}
