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
use App\Domain\Frontend\Datatables\ProductsSensorDatatable;
use App\Domain\Frontend\Models\ProductsSensor;
use App\Support\Dashboard\Crud\WithMedia;

class ProductsSensorController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy , WithMedia;

    protected string $name      = 'Products Sensor';
    protected string $path      = 'dashboard.frontend.products-sensors';
    protected string $routes    = 'dashboard.frontend.products.products_sensors' ;
    protected string $datatable = ProductsSensorDatatable::class;
    protected string $model = ProductsSensor::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['product','products_sensor'] ;
    protected array $routeList = [] ;
    protected array $mediaField = ['image'] ;



    protected function rules()
    {
        return [
            'name' => 'required|array',
            'name.*' => 'required|string',
            'image' => [new MediaRule] ,
            'old_image' => ['nullable'] ,
            'product_id' => 'required|exists:products,id',


        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
