<?php
namespace App\Admin\Renderable;

use App\Models\DocContent as ModelsDocContent;
use App\Models\Step;
use Dcat\Admin\Support\LazyRenderable;
use Dcat\Admin\Widgets\Table;

class DocContentTable extends LazyRenderable
{
    public function render()
    {
        // 获取ID
        $id = $this->key;

        // 获取其他自定义参数
        // $type = $this->post_type;

        $contents = ModelsDocContent::where('doc_id', $id)->get(['id', 'step_id']);

        $data = [];
        foreach($contents as $content) {
            $step = Step::find($content->step_id);
            $step_name = $step->alias;
            $data[] = [
                'id' => $content->id,
                'step' => $step_name,
                'link' => $step->link->alias,
                'cube' => $step->link->cube->name,
            ];
        }

        $titles = [
            'ID',
            '步骤别名',
            '环节别名',
            '小模块'
        ];

        return Table::make($titles, $data);
    }
}