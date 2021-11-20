<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\ActionTable;
use App\Admin\Repositories\Step;
use App\Models\Cube;
use App\Models\Link;
use App\Models\Module;
use App\Models\Step as ModelsStep;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Storage;

class StepController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Step(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('alias');
            $grid->column('link_id', '环节别名')->display(function($val) {
                return Link::find($val)->alias;
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
                    <source src='$audio' type='audio/mp3' />
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
            $grid->column('actions', '行动')
            ->display('行动')
            ->expand(function () {
                
                return ActionTable::make();
            });
            $grid->disableViewButton();
            $grid->disableCreateButton();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name');
                $filter->equal('link_id', '环节别名')->select(Link::all()->pluck('alias', 'id'));
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
        $builder = ModelsStep::with('actions');
        return Form::make($builder, function (Form $form) {
            $form->display('id');
            $form->text('alias', '步骤别名');
            $form->hasMany('actions', '行动', function (Form\NestedForm $form) {
                $form->text('name', '行动名');
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
