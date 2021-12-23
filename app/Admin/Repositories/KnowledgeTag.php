<?php

namespace App\Admin\Repositories;

use App\Models\KnowledgeTag as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class KnowledgeTag extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
