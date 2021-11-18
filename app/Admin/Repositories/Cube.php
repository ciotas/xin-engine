<?php

namespace App\Admin\Repositories;

use App\Models\Cube as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Cube extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
