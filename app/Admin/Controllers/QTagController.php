<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\QTag;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class QTagController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new QTag(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');

            $grid->disableViewButton();
            $grid->disableBatchActions();
            $grid->disableRowSelector();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
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
        return Form::make(new QTag(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            
            $form->disableViewButton();
            $form->disableViewCheck();
        });
    }
}
