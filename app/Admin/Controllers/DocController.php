<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\DocContentTable;
use App\Admin\Repositories\Doc;
use App\Models\Step;
use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class DocController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Doc(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('user_id')->display(function($val) {
                return User::find($val)->name;
            });
            $grid->column('push')->switch();
            $grid->column('doc_content', '内容')
            ->display('内容')
            ->expand(function () {
                return DocContentTable::make([]);
            });
        
            $grid->disableViewButton();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name');
                $filter->equal('user_id')->select(User::all()->pluck('name', 'id'));
        
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
        $builder = Doc::with('doc_contents');
        return Form::make($builder, function (Form $form) {
            $form->display('id');
            if ($form->isEditing()) {
                $form->display('name')->disable();
                $form->select('user_id')->options(User::all()->pluck('name', 'id'));
            
            } elseif($form->isCreating()) {
                $form->text('name');
                $form->select('user_id')->options(User::all()->pluck('name', 'id'));
            
            }
            
            $form->switch('push');

            $form->hasMany('doc_contents', '内容', function (Form\NestedForm $form) {
                $form->select('step_id', '步骤别名')->options(Step::all()->pluck('alias', 'id'));
            });
            // $form->display('created_at');
            // $form->display('updated_at');
            $form->disableViewCheck();
        });
    }
}
