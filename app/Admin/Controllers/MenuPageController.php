<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\MenuPage;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class MenuPageController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new MenuPage(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('banner')->image('', 60, 60);
            $grid->column('image')->image('', 60, 60);
            
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
        return Form::make(new MenuPage(), function (Form $form) {
            $form->display('id');

            $form->image('banner')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();
          
            $form->image('image')
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
