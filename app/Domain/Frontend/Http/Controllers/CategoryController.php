<?php

namespace App\Domain\Frontend\Http\Controllers;
use App\Domain\Core\Http\Controllers\MainController;
use App\Domain\Core\Rule\MediaRule;
use App\Support\Dashboard\Crud\WithDatatable;
use App\Support\Dashboard\Crud\WithDestroy;
use App\Domain\Core\Enums\CorePermissions;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Frontend\Datatables\CategoryDatatable;
use App\Domain\Frontend\Models\Category;
use App\Support\Dashboard\Crud\WithMedia;

class CategoryController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy  , WithMedia;

    protected string $name      = 'Category';
    protected string $path      = 'dashboard.frontend.categories';
    protected string $routes    = 'dashboard.frontend.categories' ;
    protected string $datatable = CategoryDatatable::class;
    protected string $model = Category::class;
    protected array  $permissions = [CorePermissions::class, 'categories'];
    protected array $routeParameters = ['category'];
    protected array $routeList = [] ;
    protected array $mediaField = ['image'] ;



    protected function rules()
    {
        return [
            'name' => 'required|array' ,
            'name.*' => 'required|string' ,
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
