<?php

namespace App\Domain\Frontend\Models;

use App\Domain\Core\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Core\Traits\EscapeUniCodeJson;
use App\Domain\Core\Traits\InteractWithSort;
use App\Domain\Core\Traits\InteractWithStatus;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\ImageOptimizer\Optimizers\Cwebp;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductsFeature extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia , HasTranslations , EscapeUniCodeJson , InteractWithSort , InteractWithStatus;

    protected $guarded = [];

    protected $translatable = [
        'name',
        'description',
    ];

    protected $casts = [
        'name' => 'json',
        'description' => 'json',
        'status' => 'boolean',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('image-thumb')
            ->performOnCollections('image')
            ->format('webp')
            ->optimize([Cwebp::class => [
                '-q 75',
            ]]);
    }

}
