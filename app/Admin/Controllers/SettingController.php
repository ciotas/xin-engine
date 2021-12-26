<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Setting;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class SettingController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Setting(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('share_img')->image('', 60, 60);
            $grid->column('contact_img')->image('', 60, 60);
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
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
        return Form::make(new Setting(), function (Form $form) {
            $form->display('id');
            
            $form->image('share_img')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png', 'image/*')
            ->chunkSize(1024)
            ->autoUpload()
            ->help('分享转发封面图片长：宽=5:4');

            $form->image('contact_img')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();

            $form->text('tips');
            
            $form->disableViewButton();
            $form->disableViewCheck();
        });
    }
}