<?php

namespace Modules\Sample\Shared\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sample\Shared\Database\factories\ModelFactory;

class Model extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'value'
    ];

    protected static function newFactory(): ModelFactory
    {
        return ModelFactory::new();
    }
}
