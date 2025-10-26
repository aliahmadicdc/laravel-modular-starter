<?php

namespace Modules\Sample\Panel\Admin\Contracts;

interface ModelInterface
{
    public function execute(array $data): array;
}
