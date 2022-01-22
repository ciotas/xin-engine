<?php

namespace App\Admin\Repositories;

use App\Models\ModuleTab as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ModuleTab extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
