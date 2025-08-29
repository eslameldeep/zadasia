<?php

namespace App\Domain\Frontend\Models;

use App\Domain\Core\Traits\EscapeUniCodeJson;
use App\Domain\Core\Traits\HasFactory;
use App\Domain\Core\Traits\InteractWithSort;
use App\Domain\Core\Traits\InteractWithStatus;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Category extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia , HasTranslations , EscapeUniCodeJson , InteractWithSort , InteractWithStatus;


    protected $guarded = [];

    protected $translatable = ['name', 'slug'];

    protected $casts = [
        'name' => 'json',
        'slug' => 'json',
        'status' => 'boolean',
    ];

}
