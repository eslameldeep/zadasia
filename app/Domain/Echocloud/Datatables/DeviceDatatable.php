<?php

namespace App\Domain\Echocloud\Datatables;

use App\Domain\Station\Models\Device;
use App\Support\Dashboard\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Column;

class DeviceDatatable extends BaseDatatable
{
    protected bool $indexer = true ;
    protected ?string $actionable = 'view';

    public ?array $buttons =  ['excel'  , 
    [
        'extend' => 'colvis',
        'columns' => ':not(.noVis)',
        'popoverTitle' => 'Column visibility selector'
    ] ,
    [
        'extend' => 'reload',
        'className' => '',
        'text' => '<i class="fas fa-sync" data-toggle="tooltip" title="Refresh"></i>'
    ] ,  
    [
        'extend' => 'collection',
        'text' => "type" , 
        'buttons' => [
            [
            'text' =>   'withdraw' ,
            'className' => 'dt-button-collection' ,
            'action' => "function (e, dt, node, config) {
                dt.columns(2).search('withdraw').draw();
            }"
        ] ,  
        [
            'text' =>   'deposit' ,
            'className' => 'dt-button-collection' ,
            'action' => "function (e, dt, node, config) {
                dt.columns(2).search('deposit').draw();
            }"
        ]
        ]
    ]
    ] ;
    
    public function query(): Builder
    {
        $user = auth()->user();
        return Device::when($user->hasRole('Client'), function ($query) use ($user) {
            $accessibleDeviceId =  $user->devices()
                ->select('devices.id')
                ->groupBy('devices.id')
                ->pluck('devices.id');

            $query->whereIn('id', $accessibleDeviceId);
        })->with([
            'Bucket','Gateway' , 'Sensors' => function ($q) {
                return $q->orderBy('attribute_type');
            } , 'Sensors.Unit'
        ]);
    }

    protected function columns(): array
    {
        return [
            Column::make('device_name.'.app()->getLocale())->title(__('name')),
            Column::make('Bucket')->title(__('Bucket')),
            Column::computed('table')->title(__('Attributes'))->hidden(),

        ];
    }
    protected function customColumns(): array
    {
        return [
            'empty' => function ($model) {
                return null ; 
            } ,
            'Bucket' => function ($model) {
                return $model?->Bucket?->name ; 
            } ,
            'table' => function ($model) {
                $attributes  = $model->Sensors;
                // dump($attributes->count());
                return view('dashboard.station.devices.table' , compact('attributes')) ; 
            }
        ];
    }



    protected function actions($model): array
    {
        
        return [
            'view' => "<a href= '".route('echocloud.devices.show' , $model->id)."' class='avatar avatar-xs rounded-circle' > <i class='fa-solid fa-arrow-up-right-from-square text-primary'></i></a>" 
        ];
    }



      
    protected function filters(): array
    {
        $multiLangColumn = [];
        available_locales()->each(function ($item, $key) use (&$multiLangColumn) {
            $multiLangColumn['device_name.' . $key] = fn ($q, $text) => $q->where("device_name", "like", "%$text%");
        });

        return [
            ...$multiLangColumn,
            'Bucket' => fn ($q, $text) => $q->whereHas('Bucket', fn($query) => $query->where("name", "like", "%$text%")),
            'status' => fn ($q, $text) => $q->where("status", "like", "%$text%"),
        ];
    }

    protected function orders(): array
    {
        $multiLangColumn = [];
        available_locales()->each(function ($item, $key) use (&$multiLangColumn) {
            $multiLangColumn['device_name.' . $key] = fn ($q, $k) => $q->orderBy(DB::raw("JSON_EXTRACT(LOWER(device_name), '$.$key') "), $k);
        });

        return [
            ...$multiLangColumn,
            'Bucket' => function ($q, $k) {
                return $q->join('buckets', 'devices.bucket_id', '=', 'buckets.id')
                         ->orderBy('buckets.name', $k)
                         ->select('devices.*');
            },
            'sort' => fn ($q, $k) => $q->orderBy('sort', $k) ,
        ];
    }

}
