<?php

namespace App\Domain\Core\Http\Controllers;
use App\Domain\Core\Http\Controllers\MainController;
use App\Support\Dashboard\Crud\WithDatatable;
use App\Support\Dashboard\Crud\WithDestroy;
use App\Domain\Core\Enums\CorePermissions;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Core\Datatables\CountryDatatable;
use App\Domain\Core\Models\Country;

class CountryController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy;

    protected string $name      = 'Country';
    protected string $path      = 'dashboard.core.countries';
    protected string $routes    = 'dashboard.core.countries' ;
    protected string $datatable = CountryDatatable::class;
    protected string $model = Country::class;
    protected array  $permissions = [CorePermissions::class, 'settings'];
    protected array $routeParameters = ['country'] ;
    protected array $routeList = [] ;



    protected function rules()
    {
        return [

        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
