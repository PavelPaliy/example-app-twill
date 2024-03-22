<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Service;

class ServiceRepository extends ModuleRepository
{
    use HandleBlocks;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }
}
