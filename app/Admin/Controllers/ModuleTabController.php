<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ModuleTab;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ModuleTabController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ModuleTab(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
        
            $grid->disableRowSelector();
            $grid->disableViewButton();
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ModuleTab(), function (Form $form) {
            $form->display('id');
            $form->text('name');
        
            $form->disableViewButton();
            $form->disableViewCheck();
        });
    }
}
