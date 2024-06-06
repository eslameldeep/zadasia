<?php

namespace App\Domain\Frontend\Datatables;

use App\Domain\Frontend\Models\Field;
use App\Support\Dashboard\Datatables\BaseDatatable;
use App\Support\Dashboard\Datatables\Columns\AlbumColumn;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

use function GuzzleHttp\Promise\each;

class FieldDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        
        return Field::withCount('FieldsFramework' , 'FieldsObjective')->orderBy('sort');
    }

    protected function columns(): array
    {
 
        return [
            Column::make('sort')->title(__('sort'))->orderable(false),
            Column::make('name.'.app()->getLocale())->title(__('name'))->orderable(false),
            Column::make('status')->title(__('status'))->orderable(false),
            Column::make('framework')->title(__('Frameworks'))->orderable(false),
            Column::make('objectives')->title(__('Objective'))->orderable(false),
            Column::make('image')->title(__('image'))->orderable(false),
        ];
    }

    protected function customColumns(): array
    {
        return [
            'image' => function ($model) {
                return AlbumColumn::render($model , 'image' ) ;
            } ,
            'framework' => function ($model) {
                return "<a href='".route($this->route.'.fields_frameworks.index' , ['field' => $model->id])."'>$model->fields_framework_count</a>" ;
            },
            'objectives' => function ($model) {
                return "<a href='".route($this->route.'.fields_objectives.index' , ['field' => $model->id])."'>$model->fields_objective_count</a>" ;
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
