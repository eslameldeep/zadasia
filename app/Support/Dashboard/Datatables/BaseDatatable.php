<?php

namespace App\Support\Dashboard\Datatables;

use App\Domain\Core\Services\RolesAndPermissions\PermissionEnum ;
use App\Support\Dashboard\Datatables\Columns\ToggleSwitchColumn;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

abstract class BaseDatatable extends DataTable
{
    
    protected ?string $actionable = 'edit|delete';

    protected bool $indexer = true;

    protected ?int $defaultOrder = 0;
    protected ?string $defaultDirection = 'desc';

    protected string $route = '';
    protected array $routeList = [];
    protected ?array $buttons =  [] ;

    public ?PermissionEnum $permission = null;

    abstract protected function columns(): array;

    abstract public function query(): Builder;

    
    public static  function getQueryFromMainClass()
    {
        $class = new Static() ;
        return $class->query();
    }

    public static  function getHtmlFromMainClass()
    {
        $class = new Static() ;
        return $class->html();
    }

    protected function customColumns(): array
    {
        return [];
    }

    protected function customColumn(string $name, string $title, $searchable = true): Column
    {
        return Column::make($name)
            ->title($title)
            ->orderable(false)
            ->searchable($searchable)
            ->content('---');
    }

    public function dataTable($query)
    {
        $datatable = datatables()->eloquent($query)
        ->setRowData([
            'data-id' => function($model) {
                return 'row-' . $model->id;
            },
        ])
        ->setRowId('id')
        ->addIndexColumn()
        ->setRowClass(function ($model) {
            return 'row1';
        } );
        $customColumns = collect($this->prepareCustomColumns());

        $customColumns->each(fn (\Closure $i, $key) => $datatable->addColumn($key, $i));

        collect($this->filters())
            ->each(fn (\Closure $i, $key) => $datatable->filterColumn($key, $i));

        collect($this->orders())
            ->each(fn (\Closure $i, $key) => $datatable->orderColumn($key, $i));

        return $datatable->rawColumns($customColumns->keys()->all());
    }

    protected function filters(): array
    {
        return [];
    }

    protected function actions($model): array
    {
        return [];
    }
    
    public function isLanguageRTL($locale)
    {
        $availableLocales = config('app.available_locales');
    
        if (array_key_exists($locale, $availableLocales)) {
            return $availableLocales[$locale]['rtl'];
        }
        
        // If the specified locale is not found in the available locales,
        // you can return a default value here if needed.
        // For example:
        // return false;
    
        return null;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $url = config('custom.FORCE_HTTPS') ?
            str_replace('http:', 'https:', secure_url(url()->full())) : url()->full();
        $builder = $this->builder()
            ->setTableId('base-datatable-table')
            ->setTableAttribute('class' , 'table table-hover dt-responsive nowrap ')
            ->columns($this->prepareColumns())
            ->minifiedAjax($url)
            ->responsive()
            ->buttons($this->buttons)
            ->dom($this->getDomVariable())
            ->pageLength()
            ->language([
                "paginate" => [
                    "next" => $this->isLanguageRTL(app()->getLocale())  ?  trans('Next').' <i class="fas fa-chevron-right"></i> ' : trans('Next').' <i class="fas fa-chevron-right"></i> '   ,
                    "previous" => $this->isLanguageRTL(app()->getLocale()) ?   ' <i class="fas fa-chevron-left"></i> '.trans('Previous')  : ' <i class="fas fa-chevron-left"></i> '.trans('Previous')
                    ] , 
                    "search"        =>      trans('search :'),
                    "lengthMenu"    =>      trans("Show _MENU_ entries"),
                    "emptyTable"    =>      trans("No data available in table"),
                    "info"          =>      trans("Showing _START_ to _END_ of _TOTAL_ entries"),
                    "infoEmpty"     =>      trans("Showing 0 to 0 of 0 entries"),
                    "zeroRecords"   =>      trans("No matching records found"),
                    "infoFiltered"  =>      trans("(filtered from _MAX_ total entries)"),
            ]);
        if ($this->defaultOrder !== null) {
            $builder->orderBy($this->defaultOrder, $this->defaultDirection);
        }

        return $builder;
    }

    public function getIndex()
    {
        $indexColumn = $this->builder()->config->get('datatables.index_column', 'DT_RowIndex');

        return new Column([
            'data'       => $indexColumn,
            'name'       => $indexColumn,
            'title'      => '#',
            'orderable'  => false,
            'searchable' => false,
        ]);
    }

    protected function column(string $name, string $title, $searchable = true): Column
    {
        return Column::make($name)
            ->title($title)
            ->orderable(false)
            ->searchable($searchable)
            ->content('---');
    }

    protected function orders(): array
    {
        return [];
    }

    private function prepareColumns()
    {
        $list = [];

        if ($this->indexer) {
            $list[] = $this->getIndex();
        }

        $list = array_merge($list, $this->columns());

        if ($this->actionable !== '') {
            $list[] = Column::computed('action')
                ->title(__('Actions'))
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                
                ->addClass('');
        }

        return $list;
    }

    public static function create(
        string $route,
        array $data = [],
        ?PermissionEnum $permission = null ,  
        ? array $routeList = null  , 

    ): static {
        $instance = new static();
        $instance->route = $route;
        $instance->routeList = $routeList ;
        $instance->customData = $data;
        $instance->permission = $permission;

        return $instance;
    }

    private function prepareCustomColumns()
    {
        $customs = $this->customColumns();
        if ($this->actionable !== '') {
            $customs['action'] = function ($model) {
                $customActions = array_map(function ($action) {
                    return $action instanceof Renderable ? $action->render() : $action;
                }, $this->actions($model));
                $allActions = array_merge(
                    $customActions,
                    $this->prepareActionsButtons($model)
                );
                $actions = implode('', $allActions);

                return "<div class='btn-group'>{$actions}</div>";
            };
        }

        $customs['status'] = function ($model) {
            try {
                return ToggleSwitchColumn::render($model->id, $model->status == 1 ? true : false, $this->routeList['update']($model , ['updateStatus' => true]));
                //code...
            } catch (\Throwable $th) {
                
            }
        };


        $customs['sort'] = function ($model) {
            $available_locales = config('app.available_locales');

            if ($available_locales[app()->getLocale()]['rtl'] == false) {
                return '<div style="color:rgb(124,77,255); padding-left: 10px; float: left; font-size: 20px; cursor: pointer;" title="change display order">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
                </div>';

            } else {
                return '<div style="color:rgb(124,77,255); padding-right: 10px; float: right; font-size: 20px; cursor: pointer;" title="change display order">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
                </div>';

            }
        } ;
        return $customs;
    }

    private function prepareActionsButtons($model)
    {
        $currentActions = explode('|', $this->actionable);

        $actions = [];

        if (in_array(
            'show',
            $currentActions
        ) && (! $this->permission || $this->permission->can('show'))) {
            $actions[] = Blade::render(File::get(__DIR__.'/actions/show_button.blade.php'), [
                'route' => route($this->route.'.show', $model),
            ]);
        }

        if (in_array(
            'edit',
            $currentActions
        ) && (! $this->permission || $this->permission->can('update'))) {
            $actions[] = Blade::render(File::get(__DIR__.'/actions/edit_button.blade.php'), [
                'route' => $this->routeList['edit']($model) ,
            ]);
        }
        if (in_array(
            'delete',
            $currentActions
        ) && (! $this->permission || $this->permission->can('delete'))) {
            $actions[] = Blade::render(File::get(__DIR__.'/actions/delete_button.blade.php'), [
                'route' => $this->routeList['destroy']($model) ,

            ]);
        }

        return $actions;
    }

    private function getDomVariable()
    {
        return <<<'HTML'
        <"d-flex justify-content-between align-items-center"f<"d-flex align-items-center"Bl>>
        rt
        <"d-flex justify-content-between align-items-center"ip>
        HTML;
    }


}
