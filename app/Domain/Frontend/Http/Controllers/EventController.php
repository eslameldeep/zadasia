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
use App\Domain\Frontend\Datatables\EventDatatable;
use App\Domain\Frontend\Models\Event;
use App\Support\Dashboard\Crud\WithMedia;

class EventController extends MainController
{
    use WithDatatable,  WithForm , WithStore ,WithUpdate , WithDestroy , WithMedia;

    protected string $name      = 'Event';
    protected string $path      = 'dashboard.frontend.events';
    protected string $routes    = 'dashboard.frontend.events' ;
    protected string $datatable = EventDatatable::class;
    protected string $model = Event::class;
    protected array  $permissions = [CorePermissions::class, 'frontend'];
    protected array $routeParameters = ['event'] ;
    protected array $routeList = [] ;
    protected array $mediaField = ['image'] ;
    


    protected function rules()
    {
        return [
            'name' => 'required|array' , 
            'name.*' => 'required|string' , 
            'description' => 'required|array' , 
            'description.*' => 'required|string' , 
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
