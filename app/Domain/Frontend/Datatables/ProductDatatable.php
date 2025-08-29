<?php

namespace App\Domain\Frontend\Datatables;

use App\Domain\Frontend\Models\Product;
use App\Support\Dashboard\Datatables\BaseDatatable;
use App\Support\Dashboard\Datatables\Columns\AlbumColumn;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ProductDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Product::withCount(['Category'])->orderBy('sort');
    }

    protected function columns(): array
    {
        return [
            Column::make('sort')->title(__('sort'))->orderable(false),
            Column::make('name.'.app()->getLocale())->title(__('name'))->orderable(false),
            Column::make('status')->title(__('status'))->orderable(false),
            Column::make('image')->title(__('image'))->orderable(false),
            Column::computed('Category')->title(__('Category'))->orderable(false),

        ];
    }


    protected function customColumns(): array
    {
        return [
            'image' => function ($model) {
                return AlbumColumn::render($model, 'image' ) ;
            } ,
            'background' => function ($model) {
                return AlbumColumn::render($model , 'background') ;
            } ,
            'Category' => function ($model) {
                return $model->Category->name;
            },

        ] ;
    }
    protected function filters(): array
    {
        $multiLangColumn = [];
        available_locales()->each(function ($item , $key) use (&$multiLangColumn) {
            $multiLangColumn['name.'.$key] = fn($q , $text) => $q->where("name" , "like" , "%$text%") ;
        });

       return [
            ...$multiLangColumn,
            'sort' => fn($q , $text) => $q->where("sort" , "like" , "%$text%") ,
            'status' => fn($q , $text) => $q->where("status" , "like" , "%$text%") ,
        ];


    }

}
