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
            $grid->column('video_title');
            $grid->column('video_url')->display('试看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->video_title);
                // 自定义图标
                $modal->icon('feather icon-video');
                return "<div style='padding:10px 10px 0;'>
                <video width='720' controls='controls'>
                    <source src='$this->video_url' type='video/mp4' />
                </video>
                </div>";
            });;
            $grid->column('video_brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('视频说明');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->video_brief</div>";
            });;
            $grid->column('title');
            $grid->column('brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('模块说明');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->brief</div>";
            });;
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

            $form->text('video_title');

            $form->url('video_url');

            $form->textarea('video_brief');
            $form->text('title');
            $form->textarea('brief');

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
