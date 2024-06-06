<?php

namespace App\Domain\Frontend\Models;

use App\Domain\Core\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Domain\Core\Traits\InteractWithSort;
use App\Domain\Core\Traits\EscapeUniCodeJson;
use App\Domain\Core\Traits\InteractWithStatus;
use Spatie\MediaLibrary\HasMedia;

class Event extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia , HasTranslations , EscapeUniCodeJson  , InteractWithStatus;


    protected $translatable = ['name', 'description', 'body', 'slug'];

    protected $casts = [
        'name' => 'json',
        'description' => 'json',
        'body' => 'json',
        'slug' => 'json',
        'status' => 'boolean',
    ];

    protected $guarded = [];
}
