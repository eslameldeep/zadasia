<?php

use Collective\Html\FormFacade;
use Illuminate\Support\Collection ; 

if (!function_exists('locale_field')) {
    function locale_field(string $name, $locale = 'ar'):  ? string
    {   
        if($name == null){
         return null ;
         
        }
        
        if ($model = FormFacade::getModel()) {
            return $model->getTranslation($name, $locale);
        }

        return null;
    }
}

if (!function_exists('field_value')) {
    function field_value($name):  ? string
    {   
        if($name == null){
         return null ;
         
        }
        
        if ($model = FormFacade::getModel()) {
            return $model->$name ;
        }

        return null;
    }
}


if (!function_exists('getModel')) {
    function getModel()
    {   
        
        if ($model = FormFacade::getModel()) {
            return $model ;
        }

        return null;
    }
}

if (!function_exists('available_locales')) {
    function available_locales() : Collection
    {   
        $available_locales = config('app.available_locales');
        return collect($available_locales) ;
    }
}
if (!function_exists('responseJson')) {
    function responseJson($response_status, $massage, $object = null, $pagination = null, $errors=null)
    {
        return response()->json([
            'message' => $massage,
            'data' => $object,
            'pagination' => $pagination,
            'errors' => $errors,
        ], $response_status);
    }
    
}

