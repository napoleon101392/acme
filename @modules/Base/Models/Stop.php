<?php

namespace Modules\Base\Models;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    protected $fillable = [
        'name', 'latitude', 'longitude'
    ];
}
