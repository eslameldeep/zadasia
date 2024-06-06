<?php

namespace App\Support\Dashboard\Crud;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait WithMedia
{
    protected function storeMediaCSV($media , $model , $collection = 'default') :bool {
        
        $media = $media ? explode(',', $media) : [];
        
        foreach ($media as $mediaId) {
            $mediaFile = Media::find($mediaId);

            $movedMediaItem = $mediaFile->move($model, $collection);

            // $mediaFile->model_type = $this->model ; 
            // $mediaFile->model_id = $model->id ; 
            // $mediaFile->collection_name = $collection ; 
            
            // $mediaFile->save();
        }

        return true ;
    }


    protected function updateMediaCSV($media , $media_old , $model , $collection = 'default') :bool {
        $media = $media ? explode(',', $media) : [];

        $media_old =  $media_old ? explode(',', $media_old) : [];;

        $media_old = Media::where('model_type', $model::class)
        ->where([
            ['model_id', '=', $model->id],
            ['collection_name', '=', $collection ],
        ])
        ->whereIn('id', $media_old)
        ->get();
        
        $model->clearMediaCollectionExcept($collection , $media_old ); 

        foreach ($media as $mediaId) {
            $mediaFile = Media::find($mediaId);
            $movedMediaItem = $mediaFile->move($model, $collection);

            // $mediaFile->model_type = $model::class ; 
            // $mediaFile->model_id = $model->id ; 
            // $mediaFile->collection_name = $collection ; 
            // $mediaFile->save();
        }

        return true ;
    }
}
