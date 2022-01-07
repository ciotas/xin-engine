<?php

namespace App\Admin\Renderable;

use App\Admin\Repositories\Tab;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;
use Dcat\Admin\Models\Administrator;

class TabTable extends LazyRenderable
{
    public function grid(): Grid
    {
        // 获取外部传递的参数
        $id = $this->id;

        return Grid::make(new Tab(), function (Grid $grid) {
            $grid->model()->orderBy('order', 'asc');

            $grid->column('id');
            $grid->column('name');
            
            $grid->quickSearch(['id', 'name']);

            $grid->paginate(20);
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name')->width(4);
            });
        });
    }
}