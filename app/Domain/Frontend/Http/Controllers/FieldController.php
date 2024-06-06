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
use App\Domain\Frontend\Datatables\FieldDatatable;
use App\Domain\Frontend\Models\Field;
use App\Support\Dashboard\Crud\WithMedia;

class FieldController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy , WithMedia;

    protected string $name      = 'Field';
    protected string $path      = 'dashboard.frontend.fields';
    protected string $routes    = 'dashboard.frontend.fields' ;
    protected string $datatable = FieldDatatable::class;
    protected string $model = Field::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['field'] ;
    protected array $routeList = [] ;
    protected array $mediaField = ['image'] ;



    protected function rules()
    {   
        return [
            'name' => 'required|array' , 
            'name.*' => 'required|string' , 
            'description' => 'required|array' , 
            'description.*' => 'required|string' , 
            'short_description' => 'required|array' , 
            'short_description.*' => 'required|string' , 
            'slug' => 'required|array' , 
            'slug.*' => 'required|string|slug' , 
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
