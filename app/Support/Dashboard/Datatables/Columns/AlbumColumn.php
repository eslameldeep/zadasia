<?php

namespace App\Support\Dashboard\Datatables\Columns;


class AlbumColumn
{
    public static function render($model , $collectionName = 'default' , $thumb = null )
    {   
        if($model->getMedia($collectionName)->count() == 0 ){
            return <<<blade
               
        blade;
        }
        $html = '<div class="image-gallery">' ;
        foreach($model->getMedia($collectionName) as $key => $media){

           $html .= "<a class='link' href='".($thumb == null ? $media?->getFullUrl() : $media?->getFullUrl($thumb ?? $collectionName))."' data-lightbox='".class_basename($model)."_".$model->id."'><img src='".($thumb == null ? $media?->getFullUrl() : $media?->getFullUrl($thumb ?? $collectionName))."'  width='70px' height='70px' class='rounded border border-2 ' alt='' /></a>"; 
        }
        $html .= "</div>";
        return <<<blade
              $html 
        blade;
    }
}
