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
use App\Domain\Frontend\Datatables\ChallengeDatatable;
use App\Domain\Frontend\Models\Challenge;
use App\Support\Dashboard\Crud\WithMedia;

class ChallengeController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy , WithMedia;

    protected string $name      = 'Challenge';
    protected string $path      = 'dashboard.frontend.challenges';
    protected string $routes    = 'dashboard.frontend.challenges' ;
    protected string $datatable = ChallengeDatatable::class;
    protected string $model = Challenge::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['challenge'] ;
    protected array $routeList = [] ;
    protected array $mediaField = ['image'] ;


    protected function rules()
    {
        return [
            'title' => 'required|array' , 
            'title.*' => 'required|string' , 
            'slogan' => 'required|array' , 
            'slogan.*' => 'required|string' , 
            'article' => 'required|array' , 
            'article.*' => 'required|string' , 
            'short_description' => 'required|array' , 
            'short_description.*' => 'required|string' , 
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
