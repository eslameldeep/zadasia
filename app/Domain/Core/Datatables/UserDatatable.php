<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Models\User;
use App\Support\Dashboard\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;


class UserDatatable extends BaseDatatable
{
    
    public function query(): Builder
    {
        return User::where('id' , '!=' , 1);
    }
    
    public function Columns():array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('email')->title(__('Email')),
            Column::make('seen')->title(__('Last seen')),
        ] ; 
    }


    
    protected function customColumns(): array
    {
        return [
            'seen' => function ($model){
                return $model->last_seen == null ? trans('No Seen yet') :  \Carbon\Carbon::parse($model->last_seen)->diffForHumans()  ;
            }
        ];
    }

    protected function orders(): array
    {
        return [
            'name' => fn ($i, $k) => $i->orderBy('name', $k),
        ];
    }

    protected function filters(): array
    {
        return [
            'name' => fn ($i, $k) => $i->where('name', 'like', "%$k%"),
        ];
    }


}
