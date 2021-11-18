<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\CubeTable;
use App\Admin\Repositories\Module;
use App\Models\Module as ModelsModule;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ModuleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Module(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('cubes', '小模块')
            ->display('小模块')
            ->expand(function () {
                return CubeTable::make([]);
            });
            // 禁用详情按钮
            $grid->disableViewButton();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name');
        
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $builder = ModelsModule::with('cubes');
        return Form::make($builder, function (Form $form) {
            $form->display('id');
            if ($form->isCreating()) {
                $form->text('name');
            }
            $form->hasMany('cubes', '小模块', function (Form\NestedForm $form) {
                $form->text('name', '小模块名');
            });
            $form->display('created_at');
            $form->display('updated_at');
            $form->disableViewCheck();

        });
    }
}
