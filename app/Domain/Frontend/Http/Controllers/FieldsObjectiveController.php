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
use App\Domain\Frontend\Datatables\FieldsObjectiveDatatable;
use App\Domain\Frontend\Models\FieldsObjective;
use App\Support\Dashboard\Crud\WithMedia;

class FieldsObjectiveController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy , WithMedia;

    protected string $name      = 'FieldsObjective';
    protected string $path      = 'dashboard.frontend.fields-objectives';
    protected string $routes    = 'dashboard.frontend.fields.fields_objectives' ;
    protected string $datatable = FieldsObjectiveDatatable::class;
    protected string $model = FieldsObjective::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['field' , 'fields_objective'] ;
    protected array $mediaField = ['image'] ;

    

    protected function rules()
    {
        return [
            'name' => 'required|array',
            'name.*' => 'required|string',
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
