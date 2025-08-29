<?php

namespace App\Domain\Frontend\Datatables;

use App\Domain\Frontend\Models\Category;
use App\Support\Dashboard\Datatables\BaseDatatable;
use App\Support\Dashboard\Datatables\Columns\AlbumColumn;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class CategoryDatatable extends BaseDatatable
{

    protected ?int $defaultOrder = 1;
    protected ?string $defaultDirection = 'desc';


    public function query(): Builder
    {
        return Category::query();
    }

    protected function columns(): array
    {
        return [
            Column::make('sort')->title(__('sort'))->orderable(false),
            Column::make('name.'.app()->getLocale())->title(__('name'))->orderable(false),
            Column::make('status')->title(__('status'))->orderable(false)->width(1),
            Column::make('image')->title(__('image'))->orderable(false),
        ];
    }
    protected function customColumns(): array
    {
        return [
            'image' => function ($model) {
                return AlbumColumn::render($model, 'image' ) ;
            } ,
        ] ;
    }
}
