<?php

namespace App\Admin\Repositories;

use App\Models\Tab as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Tab extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
