<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Tag;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class TagController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Tag(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name')->editable();
            
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
        return Form::make(new Tag(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->disableViewButton();
            $form->disableViewCheck();
        });
    }
}
