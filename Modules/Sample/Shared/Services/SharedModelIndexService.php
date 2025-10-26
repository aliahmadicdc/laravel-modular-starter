<?php

namespace Modules\Sample\Shared\Services;

use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Modules\Sample\Shared\Models\Model;

class SharedModelIndexService extends BaseService
{
    public function index(array $data): Collection
    {
        $models = Model::query()
            ->orderBy('id', 'DESC');

        if (!empty($data['title']))
            $models->where('title', 'LIKE', '%' . $data['title'] . '%');

        if (!empty($data['value']))
            $models->where('value', 'LIKE', '%' . $data['value'] . '%');

        return $models->get();

    }
}
