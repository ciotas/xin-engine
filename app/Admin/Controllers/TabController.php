<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Tab;
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
            $grid->model()->orderBy('order');
            $grid->column('id')->sortable();
            $grid->column('name')->editable();
            // $grid->order->orderable();
            $grid->column('brief')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('介绍');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->brief</div>";
            });

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
                
                $table = $this->features ? Table::make($titles, $this->features) : '';

                return "<div style='padding:10px 10px 0'>$table</div>";
            });
            $grid->column('prictice_title');
            // $grid->column('prictice_video_url')->display('试看')->modal(function ($modal) {
            //     // 设置弹窗标题
            //     $modal->title('实操视频');
            //     // 自定义图标
            //     $modal->icon('feather icon-video');
            //     return "<div style='padding:10px 10px 0;'>
            //     <video width='720' controls='controls'>
            //         <source src='$this->prictice_video_url' type='video/mp4' />
            //     </video>
            //     </div>";
            // });
            $grid->column('prictice_difficult');
            $grid->column('prictice_points')->display('查看')
            ->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->name.'的实操要点');
        
                // 自定义图标
                $modal->icon('feather icon-award');
                $titles = [
                    '说明',
                    '名称',
                ];
                
                // $tabs = $this->tabs->pluck('name', 'id');
                $table = $this->prictice_points ? Table::make($titles, $this->prictice_points) : '';

                return "<div style='padding:10px 10px 0'>$table</div>";
            });;

            $grid->column('cards')->image('', 40, 40);
            
            $grid->disableViewButton();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name');
        
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
            // $form->select('module_menu_id')->options(ModuleMenu::all()->pluck('name', 'id'));
            $form->text('name')->rules('required');
            $form->text('title')->rules('required');
            $form->textarea('brief');

            $form->table('features', function ($table) {
                $table->text('title', '标题');
                $table->textarea('desc', '描述');
            })->rules('required');
            // ->saving(function ($v) {
            //     return json_encode($v);
            // });

            $form->text('prictice_title')->rules('required');
            // $form->url('prictice_video_url');
            $form->file('prictice_video_url')
            ->uniqueName()
            ->move('videos')
            ->accept('mp4,mov,ogg,avi', 'video/*')
            ->maxSize(1024 * 100)
            ->autoUpload()->help('视频大小不超过100M，请等待上传成功提示出现后，再提交表单！');

            $form->image('prictice_video_cover')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload();
            // $form->text('prictice_video_duration');
            $form->number('prictice_difficult')->rules('numeric|min:0|max:5')->help('总分5分，例如：1星=1分');

            $form->table('prictice_points', function ($table) {
                $table->text('title', '要点');
                $table->textarea('desc', '说明');
            })->rules('required');

            $form->multipleImage('cards')
            ->uniqueName()
            ->move('images')
            ->accept('jpg,png,gif,jpeg', 'image/*')
            ->chunkSize(1024)
            ->autoUpload()
            ->sortable();

            $form->disableViewCheck();
        });
    }
}
