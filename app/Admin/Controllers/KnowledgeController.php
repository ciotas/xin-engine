<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Knowledge;
use App\Models\Knowledge as ModelsKnowledge;
use App\Models\Tag;
use Dcat\Admin\Form;
use Dcat\Admin\Form\Tab;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Table;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Request;

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
            // $grid->quickSearch('tags.name')->placeholder('搜索标签');
            // $query_str = Request::query();
            // $search = null;
            // if (isset($query_str['_search_'])) {
            //     $search = $query_str['_search_'];
            // }
            $grid->quickSearch(function ($model, $query) {
            });
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('tags')->pluck('name')->label();
            
            $grid->column('content')->display('查看')->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('说明');
                // 自定义图标
                $modal->icon('feather icon-file-text');
                return "<div style='padding:10px 10px 0'>$this->content</div>";
            });
            $grid->column('link', '链接')
            ->display(function() {
                return route('knowledge.show',['knowledge_id'=> $this->id]);
            })->copyable();

            // $grid->column('link_qrcode', '扫码查看')->display(function() {
            //     $url = route('knowledge.show',['knowledge_id'=> $this->id]);
            //     return QrCode::size(50)->generate($url);
            // });

            $grid->column('link_qrcode', '扫码查看')->qrcode(function () {
                return $this->link_qrcode;
            }, 100, 100);
            
            $grid->disableViewButton();
            $grid->disableFilter();
            
            // $grid->filter(function (Grid\Filter $filter) {
            //     $filter->panel();
            //     $filter->where('标签', function($query) {
            //         $query->whereHas('tags', function($query) {
            //             $query->where('name', 'like', "%{$this->input}%");
            //         })
            //         ->orWhere('title', 'like', "%{$this->input}%")
            //         ->orWhere('content', 'like', "%{$this->input}%");
            //     })->width(4);
                
        
            // });
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
