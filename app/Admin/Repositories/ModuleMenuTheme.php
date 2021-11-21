<?php

namespace App\Admin\Repositories;

use App\Models\ModuleMenuTheme as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ModuleMenuTheme extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
