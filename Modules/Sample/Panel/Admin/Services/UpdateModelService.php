<?php

namespace Modules\Sample\Panel\Admin\Services;

use App\Services\BaseService;
use Modules\Sample\Shared\Models\Model;

class UpdateModelService extends BaseService
{
    public function update(Model $model, array $data): Model
    {
        $model->query()->update($data);

        $model->refresh();

        return $model;
    }
}
