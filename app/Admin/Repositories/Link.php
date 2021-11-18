<?php

namespace App\Admin\Repositories;

use App\Models\Link as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Link extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
