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
use App\Domain\Frontend\Datatables\ArticleDatatable;
use App\Domain\Frontend\Models\Article;
use App\Support\Dashboard\Crud\WithMedia;

class ArticleController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy , WithMedia;

    protected string $name      = 'Article';
    protected string $path      = 'dashboard.frontend.articles';
    protected string $routes    = 'dashboard.frontend.articles' ;
    protected string $datatable = ArticleDatatable::class;
    protected string $model = Article::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['article'] ;
    protected array $routeList = [] ;
    protected array $mediaField = ['image'] ;

    

    protected function rules()
    {
        return [
            'name' => 'required|array' , 
            'name.*' => 'required|string' , 
            'sub_name' => 'required|array' , 
            'sub_name.*' => 'required|string' , 
            'body' => 'required|array' , 
            'body.*' => 'required|string' , 
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
