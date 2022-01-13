<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Theme;
use App\Models\ModuleMenu;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Widgets\Table;

class ThemeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Theme(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->title.'介绍');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->brief</div>";
            });
            
            $grid->column('module_menus', '模块')->pluck('name')->label();
        
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
        return Form::make(Theme::with('module_menus'), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->textarea('brief');

            $form->multipleSelect('module_menus', '大模块')
            ->options(ModuleMenu::all()->pluck('name', 'id'))
            ->customFormat(function ($v) {
                if (! $v) {
                    return [];
                }
                // 从数据库中查出的二维数组中转化成ID
                return array_column($v, 'id');
            });
            $form->disableViewCheck();
        });
    }
}
