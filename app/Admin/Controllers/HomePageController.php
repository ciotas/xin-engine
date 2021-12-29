<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\HomePage;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class HomePageController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new HomePage(), function (Grid $grid) {
            // $grid->column('id')->sortable();
            $grid->column('banners')->image('', 60, 60);
            $grid->column('service_items')->image('', 60, 60);
            $grid->column('service_steps')->image('', 60, 60);
            $grid->column('brief')->image('', 60, 60);
            $grid->column('case_bg')->image('', 60, 60);
            $grid->column('examples')->image('', 60, 60);
            $grid->column('brief')->image('', 60, 60);

            $grid->disableViewButton();
            $grid->disableFilterButton();
            $grid->disableBatchActions();
            $grid->disableBatchDelete();
            $grid->disableRowSelector();
            
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new HomePage(), function (Form $form) {
            $form->display('id');

            $form->multipleImage('banners')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload()
            ->sortable()
            ->help('可同时上传多张图片');

            $form->image('service_items')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();

            $form->image('service_steps')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();

            $form->image('case_bg')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();

            $form->multipleImage('examples')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload()
            ->sortable()
            ->help('可同时上传多张图片');

            $form->image('brief')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();

            $form->disableViewCheck();

            $form->footer(function ($footer) {
                // 去掉`继续创建`checkbox
                $footer->disableCreatingCheck();
            });
            
        });
    }
}
