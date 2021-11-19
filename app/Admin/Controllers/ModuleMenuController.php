<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ModuleMenu;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ModuleMenuController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ModuleMenu(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('en_name');
            $grid->column('brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->name.'说明');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->brief</div>";
            });
            $grid->column('cover')->image('', 60, 60);
            $grid->column('bg_img')->image('', 60, 60);
            $grid->column('dot_img')->image('', 60, 60);
            $grid->column('tags_img')->image('', 30, 30);
            $grid->column('video_title');
            $grid->column('video_url')->display('试看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('视频');
                // 自定义图标
                $modal->icon('feather icon-video');
                return "<div style='padding:10px 10px 0;'>
                <video width='720' controls='controls'>
                    <source src='$this->video_url' type='video/mp4' />
                </video>
                </div>";
            });
            $grid->column('video_brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('说明');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->video_brief</div>";
            });
            $grid->column('videos_duration');
            
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
        return Form::make(new ModuleMenu(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('en_name');
            $form->textarea('brief');

            $form->image('cover')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();

            $form->image('bg_img')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();

            $form->image('dot_img')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();

            $form->multipleImage('tags_img')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload()
            ->sortable();

            $form->text('video_title');
            $form->url('video_url');
            $form->textarea('video_brief');
            $form->text('videos_duration');
            $form->disableViewCheck();

        });
    }
}
