<?php

namespace App\Support\Dashboard\Datatables\Columns;

class ToggleSwitchColumn
{
    public static function render($id, $status , $route)
    {
        $checked = $status ? 'checked="checked"' : '';
        $float = app()->isLocale('ar') ? 'float-end' : '' ;
            
        return <<<HTML
        
            <div class="form-check form-switch $float">
                <input class="form-check-input" type="checkbox" onclick="changeModelStatus(event)" role="switch" id="s_$id" data-href="$route" $checked >
            </div>
        
        HTML;
    }
}
