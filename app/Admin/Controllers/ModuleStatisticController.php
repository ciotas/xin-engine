<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ModuleStatistic;
use App\Models\ModuleMenu;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ModuleStatisticController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ModuleStatistic(), function (Grid $grid) {
            $grid->model()->orderBy('num', 'desc');
            // $grid->column('id')->sortable();
            // $grid->column('module_tab_id');
            // $grid->column('theme_id');
            $grid->column('module_menu_id')->display(function($val) {
                return ModuleMenu::find($val)->name;
            });
            $grid->column('num');
            // $grid->column('day');
            $grid->disableRowSelector();
            $grid->disableBatchActions();
            $grid->disableBatchDelete();
            $grid->disableActions();
            $grid->disableViewButton();
            $grid->disableCreateButton();
            $grid->disableFilterButton();
            $grid->disableColumnSelector();
        
        });
    }

}
