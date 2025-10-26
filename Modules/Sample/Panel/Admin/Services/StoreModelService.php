<?php

namespace Modules\Sample\Panel\Admin\Services;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use App\Services\BaseService;
use Modules\Sample\Shared\Models\Model;

class StoreModelService extends BaseService
{
    public function store(array $data): EloquentModel
    {
        return Model::query()->create($data);
    }
}
