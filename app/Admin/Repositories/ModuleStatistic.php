<?php

namespace App\Admin\Repositories;

use App\Models\ModuleStatistic as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ModuleStatistic extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
