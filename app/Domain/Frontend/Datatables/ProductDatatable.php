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
        return Product::withCount(['ProductsFeature' ,'ProductsSensor'])->orderBy('sort');
    }

    protected function columns(): array
    {
        return [
            Column::make('sort')->title(__('sort'))->orderable(false),
            Column::make('name.'.app()->getLocale())->title(__('name'))->orderable(false),
            Column::make('sub_name.'.app()->getLocale())->title(__('sub name'))->orderable(false),
            Column::make('status')->title(__('status'))->orderable(false),
            Column::make('ProductsFeature')->title(__('Features'))->orderable(false),
            Column::make('ProductsSensor')->title(__('Sensors'))->orderable(false),
            Column::make('image')->title(__('image'))->orderable(false),
            Column::make('background')->title(__('background'))->orderable(false),

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
            'ProductsFeature' => function ($model) {
                return "<a href='".route($this->route.'.products_features.index' , ['product' => $model->id])."'>$model->products_feature_count</a>" ;
            },
            'ProductsSensor' => function ($model) {
                return "<a href='".route($this->route.'.products_sensors.index' , ['product' => $model->id])."'>$model->products_sensor_count</a>" ;
            },
        ] ; 
    }
    protected function filters(): array
    {
        $multiLangColumn = []; 
        available_locales()->each(function ($item , $key) use (&$multiLangColumn) {
            $multiLangColumn['name.'.$key] = fn($q , $text) => $q->where("name" , "like" , "%$text%") ; 
            $multiLangColumn['sub_name.'.$key] = fn($q , $text) => $q->where("sub_name" , "like" , "%$text%") ; 
        });
        
       return [
            ...$multiLangColumn,
            'sort' => fn($q , $text) => $q->where("sort" , "like" , "%$text%") , 
            'status' => fn($q , $text) => $q->where("status" , "like" , "%$text%") ,
        ];

        
    }

}
