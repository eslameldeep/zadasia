<?php

namespace App\Domain\Core\Models;

use App\Domain\Core\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];
}
