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
use App\Domain\Frontend\Datatables\SoftwareDatatable;
use App\Domain\Frontend\Models\Software;
use App\Support\Dashboard\Crud\WithMedia;

class SoftwareController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy , WithMedia;

    protected string $name      = 'Software';
    protected string $path      = 'dashboard.frontend.software';
    protected string $routes    = 'dashboard.frontend.softwares' ;
    protected string $datatable = SoftwareDatatable::class;
    protected string $model = Software::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['software'] ;
    protected array $routeList = [] ;
    protected array $mediaField = ['image'] ;



    protected function rules()
    {
        return [
            'title' => 'required|array' , 
            'title.*' => 'required|string' , 
            'sub_title' => 'required|array' , 
            'sub_title.*' => 'required|string' , 
            'description' => 'required|array' , 
            'description.*' => 'required|string' , 
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
