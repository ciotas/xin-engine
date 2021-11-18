<?php

namespace App\Admin\Repositories;

use App\Models\Step as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Step extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
