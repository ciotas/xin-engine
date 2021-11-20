<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\ShowMedia;
use App\Admin\Renderable\StepTable;
use App\Admin\Repositories\Link;
use App\Models\Cube;
use App\Models\Link as ModelsLink;
use App\Models\Module;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Storage;

class LinkController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Link(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('alias');
            $grid->column('cube_id')->display(function($val) {
                return Cube::find($val)->name;
            });
            
            $grid->column('brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->name.'说明');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->brief</div>";
            });
            $grid->column('image')->image('', 80, 80);
            $grid->column('audio')->display('试听')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->name.'音频');
                // 自定义图标
                $modal->icon('feather icon-headphones');
                $audio = $this->audio ? Storage::disk('oss')->url($this->audio) : '';

                return "<div style='padding:10px 10px 0'>
                <audio height='480' controls='controls'>
                    <source src='$audio' type='video/mp4' />
                </audio>
                </div>";
            });
            $grid->column('video')->display('试看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->name.'视频');
                // 自定义图标
                $modal->icon('feather icon-video');
                return "<div style='padding:10px 10px 0;'>
                <video width='720' controls='controls'>
                    <source src='$this->video' type='video/mp4' />
                </video>
                </div>";
            });
            $grid->column('steps', '步骤')
            ->display('步骤')
            ->expand(function () {
                
                return StepTable::make();
            });
            
            $grid->disableViewButton();
            $grid->disableCreateButton();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name');
                $filter->equal('cube_id', '小模块')->select(Cube::all()->pluck('name', 'id'));
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
        $builder = ModelsLink::with('steps');
        return Form::make($builder, function (Form $form) {
            $form->display('id');

            $form->text('alias', '环节别名')->disable();

            $form->hasMany('steps', '步骤', function (Form\NestedForm $form) {
                $form->text('name', '步骤名');
                $form->text('alias', '步骤别名');
                $form->text('brief', '说明');
                $form->image('image', '图片')
                ->uniqueName()
                ->move('images')
                ->accept('jpg,png,gif,jpeg', 'image/*')
                ->chunkSize(1024)
                ->autoUpload();

                $form->file('audio', '音频')
                ->uniqueName()
                ->move('audios')
                ->chunkSize(1024)
                ->maxSize(1024*50)
                ->autoUpload();
                $form->url('video', '视频');
            });
        
            $form->disableViewCheck();
        });
    }
}
