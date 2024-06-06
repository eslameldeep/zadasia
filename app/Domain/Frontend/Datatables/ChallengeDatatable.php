<?php

namespace App\Domain\Frontend\Datatables;

use App\Domain\Frontend\Models\Challenge;
use App\Support\Dashboard\Datatables\BaseDatatable;
use App\Support\Dashboard\Datatables\Columns\AlbumColumn;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ChallengeDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Challenge::orderBy('sort');
    }

    protected function columns(): array
    {
        return [
            Column::make('sort')->title(__('sort'))->orderable(false),
            Column::make('title.'.app()->getLocale())->title(__('Title'))->orderable(false),
            Column::make('slogan.'.app()->getLocale())->title(__('Slogan'))->orderable(false),
            Column::make('status')->title(__('status'))->orderable(false),
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
    protected function filters(): array
    {
        $multiLangColumn = []; 
        available_locales()->each(function ($item , $key) use (&$multiLangColumn) {
            $multiLangColumn['title.'.$key] = fn($q , $text) => $q->where("title" , "like" , "%$text%") ; 
            $multiLangColumn['slogan.'.$key] = fn($q , $text) => $q->where("slogan" , "like" , "%$text%") ; 
        });
        
       return [
            ...$multiLangColumn,
            'sort' => fn($q , $text) => $q->where("sort" , "like" , "%$text%") , 
            'status' => fn($q , $text) => $q->where("status" , "like" , "%$text%") ,
        ];

        
    }
}
