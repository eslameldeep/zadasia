<?php

namespace App\Domain\Core\Models;

use App\Domain\Core\Traits\EscapeUniCodeJson;
use App\Domain\Core\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory,InteractsWithMedia , HasTranslations , EscapeUniCodeJson ;

    protected $guarded = [];
    public $timestamps = false;
    
    protected $translatable = ['name'];

}
