<?php

namespace App\Admin\Repositories;

use App\Models\ModuleMenu as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ModuleMenu extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    protected $fillable = ['name', 'en_name', 'brief', 'cover', 'bg_img', 
    'dot_img', 'tags_img', 'video_title',
    'video_url', 'video_brief', 'videos_duration'];

    protected $casts = [
        'tags_img' => 'json'
    ];
}
