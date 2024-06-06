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
use App\Domain\Frontend\Datatables\PartnerDatatable;
use App\Domain\Frontend\Models\Partner;
use App\Support\Dashboard\Crud\WithMedia;

class PartnerController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy , WithMedia;

    protected string $name      = 'Partners';
    protected string $path      = 'dashboard.frontend.partners';
    protected string $routes    = 'dashboard.frontend.partners' ;
    protected string $datatable = PartnerDatatable::class;
    protected string $model = Partner::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['partner'] ;
    protected array $routeList = [] ;
    protected array $mediaField = ['image'] ;




    protected function rules()
    {
        return [
            'name' => 'required|array' , 
            'name.*' => 'required|string' , 
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
