<?php

namespace App\Admin\Repositories;

use App\Models\HomePage as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class HomePage extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
