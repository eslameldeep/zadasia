<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\ImageOptimizer\Optimizers\Cwebp;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class File extends Model implements HasMedia    
{
    use HasFactory, InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
        ->performOnCollections('image' , 'default')    
        ->format('webp')
            ->optimize([Cwebp::class => [
                '-q 75',
            ]]);
    }


}
