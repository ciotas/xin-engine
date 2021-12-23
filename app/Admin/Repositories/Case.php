<?php

namespace App\Admin\Repositories;

use App\Models\Case as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Case extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
