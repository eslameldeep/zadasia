<?php

namespace App\Domain\Frontend\Http\Controllers;
use App\Domain\Core\Http\Controllers\MainController;
use App\Domain\Frontend\Models\Category;
use App\Support\Dashboard\Crud\WithDatatable;
use App\Support\Dashboard\Crud\WithDestroy;
use App\Domain\Core\Enums\CorePermissions;
use App\Domain\Core\Rule\MediaRule;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Frontend\Datatables\ProductDatatable;
use App\Domain\Frontend\Models\Product;
use App\Support\Dashboard\Crud\WithMedia;

class ProductController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy , WithMedia;

    protected string $name      = 'Product';
    protected string $path      = 'dashboard.frontend.products';
    protected string $routes    = 'dashboard.frontend.products' ;
    protected string $datatable = ProductDatatable::class;
    protected string $model = Product::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['product'] ;
    protected array $routeList = [] ;
    protected array $mediaField = ['image' , 'background'] ;



    protected function rules()
    {
        return [
            'name' => 'required|array',
            'name.*' => 'required|string',
            'sub_name' => 'required|array',
            'sub_name.*' => 'required|string',
            'description' => 'required|array',
            'description.*' => 'required|string',
            'short_description' => 'required|array',
            'short_description.*' => 'required|string',
            'specs' => 'required|array',
            'specs.*' => 'required|string',
            'slug' => 'required|array',
            'slug.*' => 'required|slug',

            'image' => [new MediaRule] ,
            'old_image' => ['nullable'] ,
            'background' => [new MediaRule] ,
            'old_background' => ['nullable']
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [
            'categories' => Category::get(['id' , 'name'])->toArray()  ;
        ];
    }
}
