<?php
namespace App\Admin\Renderable;

use App\Models\Cube;
use App\Models\Step;
use Dcat\Admin\Support\LazyRenderable;
use Dcat\Admin\Widgets\Table;

class CubeTable extends LazyRenderable
{
    public function render()
    {
        // 获取ID
        $id = $this->key;

        // 获取其他自定义参数
        // $type = $this->post_type;

        $data = Cube::where('module_id', $id)->get(['id', 'name'])->toArray();

        
        $titles = [
            'ID',
            '小模块名',
        ];

        return Table::make($titles, $data);
    }
}