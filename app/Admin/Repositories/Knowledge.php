<?php

namespace App\Admin\Repositories;

use App\Models\Knowledge as Model;
use App\Models\Knowledge as ModelsKnowledge;
use Dcat\Admin\Grid\Model as GridModel;
use Dcat\Admin\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Request;

class Knowledge extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    public function get(GridModel $model)
    {
        $query_str = Request::query();
        $search = '';
        if (isset($query_str['_search_'])) {
            $search = $query_str['_search_'];
        }
        $builder = $search ? ModelsKnowledge::search($search) : ModelsKnowledge::query();
        return $model->makePaginator(
            $data['total'] = $builder->count() ?? 0, // 传入总记录数
            $data['subjects'] = $builder->get() ?? [] // 传入数据二维数组
        );

    }

}
