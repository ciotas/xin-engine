<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ModuleTab;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ModuleTabController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ModuleTab(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('video_title');
            
            $grid->column('video_brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('视频说明');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->video_brief</div>";
            });
            $grid->column('video_cover')->image('', 60, 60);
            $grid->column('order_no')->editable();
            $grid->disableRowSelector();
            $grid->disableViewButton();
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ModuleTab(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('video_title');

            $form->file('video_url')
            ->uniqueName()
            ->move('videos')
            ->accept('mp4,mov,ogg,avi', 'video/*')
            ->maxSize(1024 * 100)
            ->autoUpload()->help('视频大小不超过100M，请等待上传成功提示出现后，再提交表单！');

            $form->image('video_cover')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();
            $form->textarea('video_brief');
            $form->number('order_no');
            $form->disableViewButton();
            $form->disableViewCheck();
            
        });
    }
}
