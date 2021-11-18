<?php

namespace App\Admin\Repositories;

use App\Models\DocContent as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class DocContent extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
