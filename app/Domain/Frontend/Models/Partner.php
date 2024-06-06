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

class Partner extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia , HasTranslations , EscapeUniCodeJson , InteractWithSort , InteractWithStatus;

    protected $guarded = [];

    protected $translatable = ['name'];

    protected $casts = [
        'name' => 'json',
        'status' => 'boolean',
    ];

}

