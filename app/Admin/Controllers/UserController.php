<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('email');
            $grid->column('mobile');
            $grid->column('password_tips');
            // $grid->column('avatar');
            // $grid->column('remember_token');
            // $grid->column('created_at');
            // $grid->column('updated_at')->sortable();
            $grid->disableViewButton();
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
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('name')->rules('required');
            $form->email('email')->rules('required');
            $form->mobile('mobile')->rules('required');
            $form->hidden('avatar');
            $form->password('password')->rules('required');
            $form->text('password_tips');
            $form->display('created_at');
            $form->display('updated_at');
            $form->disableViewCheck();
            $form->saving(function (Form $form) {
                $form->password = Hash::make($form->password);
                $form->avatar = '';
            });
            
        });
    }
}
