<?php
namespace App\Admin\Renderable;

use App\Models\Step;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;
use Dcat\Admin\Widgets\Table;

class StepTable extends LazyRenderable
{
    public function grid(): Grid
    {
        $id = $this->key;
        $builder = Step::where('link_id', $id);
        return Grid::make($builder, function (Grid $grid) {
            $grid->column('id', 'ID');
            $grid->column('name', '步骤名');
            $grid->column('alias', '步骤别名');
            $grid->column('brief', '说明')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->name.'说明');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->brief</div>";
            });
            $grid->column('image', '图片')->image('', 80, 80);
            $grid->column('audio', '音频')->display('试听')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->name.'音频');
                // 自定义图标
                $modal->icon('feather icon-headphones');
                return "<div style='padding:10px 10px 0'>
                <audio height='480' controls='controls'>
                    <source src='$this->audio' type='video/mp4' />
                </audio>
                </div>";
            });
            $grid->column('video', '视频')->display('试看')->modal(function ($modal) {
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
            $grid->disableActions();
            $grid->disableRefreshButton();
            $grid->disableCreateButton();
            $grid->disableBatchActions();
            $grid->disableBatchDelete();
            $grid->disableFilter();
            $grid->disablePagination();
            $grid->disableRowSelector();
    
        });
    }

}