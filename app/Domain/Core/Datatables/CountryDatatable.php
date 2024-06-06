<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Models\Country;
use App\Support\Dashboard\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class CountryDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Country::query();
    }

    protected function columns(): array
    {
        return [
            Column::make('iso')->title(__('iso')),
            Column::make('name.'.app()->getLocale())->title(__('name'))->orderable(false),
            Column::make('iso3')->title(__('iso3')),
            Column::make('numcode')->title(__('numcode')),
            Column::make('phonecode')->title(__('phonecode')),
        ];
    }


    protected function filters(): array
    {
        $multiLangColumn = []; 
        available_locales()->each(function ($item , $key) use (&$multiLangColumn) {
            $multiLangColumn['name.'.$key] = fn($q , $text) => $q->where("name" , "like" , "%$text%") ; 
        });
        
       return [
            ...$multiLangColumn,
        ];

        
    }
}
