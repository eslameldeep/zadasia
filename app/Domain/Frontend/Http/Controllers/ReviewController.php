<?php

namespace App\Domain\Frontend\Http\Controllers;

use App\Domain\Core\Http\Controllers\MainController;
use App\Domain\Core\Rule\MediaRule;
use App\Support\Dashboard\Crud\WithDatatable;
use App\Support\Dashboard\Crud\WithDestroy;
use App\Domain\Core\Enums\CorePermissions;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithMedia;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Frontend\Datatables\ReviewDatatable;
use App\Domain\Frontend\Models\Review;

class ReviewController extends MainController
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy , WithMedia;

    protected string $name = 'Review';
    protected string $path = 'dashboard.frontend.reviews';
    protected string $routes = 'dashboard.frontend.reviews';
    protected string $datatable = ReviewDatatable::class;
    protected string $model = Review::class;
    protected array $permissions = [CorePermissions::class, 'reviews'];
    protected array $routeParameters = ['review'];
    protected array $routeList = [];
    protected array $mediaField = ['image'] ;



    protected function rules()
    {
        return [
            "client_name" => "required|array",
            "client_name.*" => "required|string",
            "client_job_title" => "required|array",
            "client_job_title.*" => "required|string",
            "client_review" => "required | array",
            "client_review.*" => "required | string",
            "stars" => "required|in:1,2,3,4,5",
            'image' => [new MediaRule] ,
            'old_image' => ['nullable'] ,

        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
