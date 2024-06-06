<?php

namespace App\Domain\Frontend\Http\Controllers;
use App\Domain\Core\Http\Controllers\MainController;
use App\Support\Dashboard\Crud\WithDatatable;
use App\Support\Dashboard\Crud\WithDestroy;
use App\Domain\Core\Enums\CorePermissions;
use App\Domain\Core\Rule\MediaRule;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Frontend\Datatables\FieldsFrameworkDatatable;
use App\Domain\Frontend\Models\FieldsFramework;
use App\Support\Dashboard\Crud\WithMedia;

class FieldsFrameworkController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy ,  WithMedia;

    protected string $name      = 'FieldsFramework';
    protected string $path      = 'dashboard.frontend.fields-frameworks';
    protected string $routes    = 'dashboard.frontend.fields.fields_frameworks' ;
    protected string $datatable = FieldsFrameworkDatatable::class;
    protected string $model = FieldsFramework::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['field' , 'fields_framework'] ;
    protected array $mediaField = ['image'] ;

    



    protected function rules()
    {
        return [
            'name' => 'required|array',
            'name.*' => 'required|string',
            'sub_name' => 'required|array',
            'sub_name.*' => 'required|string',
            'description' => 'required|array',
            'description.*' => 'required|string',
            'field_id' => 'required|exists:fields,id',
            'status' => 'sometimes',
            'image' => [new MediaRule] ,
            'old_image' => ['nullable'] 
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
