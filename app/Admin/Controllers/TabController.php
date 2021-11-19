<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Tab;
use App\Models\ModuleMenu;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Support\JavaScript;
use Dcat\Admin\Widgets\Table;

class TabController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Tab(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('module_menu_id')->display(function($val) {
                return ModuleMenu::find($val)->name;
            });
            $grid->column('name');
            $grid->column('brief');
            $grid->column('features')->display('特点')
            ->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('特点');
        
                // 自定义图标
                $modal->icon('feather icon-award');
                $titles = [
                    '描述',
                    '名称',
                ];
                $table = Table::make($titles, $this->features);
        
                return "<div style='padding:10px 10px 0'>$table</div>";
            });
            $grid->column('prictice_title');
            $grid->column('prictice_video_url')->display('试看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('实操视频');
                // 自定义图标
                $modal->icon('feather icon-video');
                return "<div style='padding:10px 10px 0;'>
                <video width='720' controls='controls'>
                    <source src='$this->prictice_video_url' type='video/mp4' />
                </video>
                </div>";
            });
            $grid->column('prictice_brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('实操描述');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->prictice_brief</div>";
            });
            $grid->column('card_title');
            $grid->column('card_img')->image('', 60, 60);
            $grid->column('card_brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('工具卡描述');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->card_brief</div>";
            });
            
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
        return Form::make(new Tab(), function (Form $form) {
            $form->display('id');
            $form->select('module_menu_id')->options(ModuleMenu::all()->pluck('name', 'id'));
            $form->text('name');
            $form->text('brief');

            $form->table('features', function ($table) {
                $table->text('title', '标题');
                $table->textarea('desc', '描述');
            });
            // ->saving(function ($v) {
            //     return json_encode($v);
            // });

            $form->text('prictice_title');
            $form->text('prictice_video_url');
            $form->editor('prictice_brief');
            $form->text('card_title');
            $form->image('card_img')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();
            $form->textarea('card_brief');
        
            
            $form->disableViewCheck();
        });
    }
}
