<?php

namespace App\Admin\Repositories;

use App\Models\Theme as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Theme extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
