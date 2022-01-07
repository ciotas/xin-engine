<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Model;

class ModuleMenuTab extends Model implements Sortable
{
	use HasDateTimeFormatter, SortableTrait;
    protected $table = 'module_menu_tab';

    protected $sortable = [
        // 设置排序字段名称
        'order_column_name' => 'order',
        // 是否在创建时自动排序，此参数建议设置为true
        'sort_when_creating' => true,
    ];

    
}
