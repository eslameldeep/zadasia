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

class Software extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia , HasTranslations , EscapeUniCodeJson , InteractWithSort , InteractWithStatus;

    protected $table = 'softwares' ;
    protected $guarded = [];

    protected $translatable = ['title', 'sub_title', 'description'];

    protected $casts = [
        'title' => 'json',
        'sub_title' => 'json',
        'description' => 'json',
        'status' => 'boolean',
    ];

}
