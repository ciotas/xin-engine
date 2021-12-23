<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Knowledge;
use App\Models\Tag;
use Dcat\Admin\Form;
use Dcat\Admin\Form\Tab;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Table;

use Dcat\Admin\Http\Controllers\AdminController;

class KnowledgeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Knowledge(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('tags', '标签')->display('查看')
            ->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title($this->title.'下的标签');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                $titles = ['ID', '名称'];
                $tags = $this->tags->pluck('name', 'id');
                $table = Table::make($titles, $tags);
                return "<div style='padding:10px 10px 0'>$table</div>"; 
            });
            $grid->column('content');
            $grid->column('content')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('说明');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->content</div>";
            });
            
            $grid->disableViewButton();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->where('search', '搜索', function($query) {
                    $query->whereHas('tags', function($query) {
                        $query->where('name', 'like', "%{$this->input}%");
                    })->orWhere('title', 'like', "%{$this->input}%")
                    ->orWhere('content', 'like', "%{$this->input}%");
                });
        
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
        return Form::make(Knowledge::with('tags'), function (Form $form) {
            $form->display('id');
            $form->text('title');
            
            $form->multipleSelect('tags', '标签')
            ->options(Tag::all()->pluck('name', 'id'))
            ->customFormat(function ($v) {
                if (! $v) {
                    return [];
                }
    
                // 从数据库中查出的二维数组中转化成ID
                return array_column($v, 'id');
            });

            $form->editor('content');
            $form->disableViewButton();
            $form->disableViewCheck();
        });
    }
}
