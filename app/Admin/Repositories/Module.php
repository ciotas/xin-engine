<?php

namespace App\Admin\Repositories;

use App\Models\Module as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Module extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
