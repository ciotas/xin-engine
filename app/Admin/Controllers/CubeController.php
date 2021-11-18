<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\LinkTable;
use App\Admin\Repositories\Cube;
use App\Models\Cube as ModelsCube;
use App\Models\Module;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class CubeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Cube(), function (Grid $grid) {
        
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('module_id')->display(function($val) {
                return Module::find($val)->name;
            });
            $grid->column('links', '环节')
            ->display('环节')
            ->expand(function () {
                
                return LinkTable::make();
            });
            // 禁用详情按钮
            $grid->disableViewButton();
            $grid->disableCreateButton();
            $grid->toolsWithOutline(false);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name');
                $filter->equal('module_id', '大模块')->select(Module::all()->pluck('name', 'id'));
        
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
        $builder = ModelsCube::with('links');
        return Form::make($builder, function (Form $form) {
            $form->display('id');
            if ($form->isEditing()) {
                $form->text('name')->disable();
            }
            $form->hasMany('links', '环节', function (Form\NestedForm $form) {
                $form->text('name', '环节名');
                $form->text('alias', '环节别名');
                $form->text('brief', '说明');
                $form->url('image', '图片');
                $form->url('audio', '音频');
                $form->url('video', '视频');
            });
            $form->display('created_at');
            $form->display('updated_at');
            $form->disableViewCheck();
        });
    }
}
