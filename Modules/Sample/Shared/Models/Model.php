<?php

namespace Modules\Sample\Shared\Models;

use App\Models\BaseModel;

class Model extends BaseModel
{
    protected $fillable=[
        'title',
        'value'
    ];
}
