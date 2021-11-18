<?php

namespace App\Admin\Repositories;

use App\Models\Action as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Action extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
