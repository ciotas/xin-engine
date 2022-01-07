<?php

namespace App\Admin\Controllers;

use App\Models\ModuleMenu;
use App\Models\ModuleMenuTab;
use App\Models\Tab;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Request;

class ModuleMenuTabController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ModuleMenuTab(), function (Grid $grid) {
            $grid->model()->orderBy('order');
            $grid->column('id')->sortable();
            $grid->column('module_menu_id')->display(function($val) {
                return ModuleMenu::find($val)->name;
            });
            $grid->column('tab_id')->display(function($val) {
                return Tab::find($val)->name;
            });
            $grid->column('order')->orderable();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->equal('module_menu_id')->select(ModuleMenu::all()->pluck('name', 'id'));
                
            });
            $grid->disableRowSelector();
            $grid->disableViewButton();
        });
    }

    protected function form()
    {
        return Form::make(new ModuleMenuTab(), function (Form $form) {
            $form->select('module_menu_id')->options(ModuleMenu::all()->pluck('name', 'id'));
            $form->select('tab_id')->options(Tab::all()->pluck('name', 'id'));
            $form->number('order');
            $form->disableViewButton();
        });
    }

}
