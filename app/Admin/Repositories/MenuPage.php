<?php

namespace App\Admin\Repositories;

use App\Models\MenuPage as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class MenuPage extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
