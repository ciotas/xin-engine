<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tab extends Model implements Sortable
{
	use HasDateTimeFormatter,SortableTrait;
	
	protected $sortable = [
        // 设置排序字段名称
        'order_column_name' => 'order',
        // 是否在创建时自动排序，此参数建议设置为true
        'sort_when_creating' => true,
    ];

	protected $casts = [
		'features' => 'json',
		'cards'=> 'json',
		'prictice_points'=> 'json'
	];

	public function getPricticeVideoCover()
	{
		return $this->prictice_video_cover ? Storage::disk('oss')->url($this->prictice_video_cover) : ''; 
	}

	public function getPricticeVideoUrl()
	{
		return $this->prictice_video_url ? Storage::disk('oss')->url($this->prictice_video_url) : ''; 
	}

	public function getCards()
    {
        $data = [];
		if ($this->cards) {
			foreach($this->cards as $card)
			{
				$data[] = Storage::disk('oss')->url($card);
			}
		}
        return $data;
    }
	
	public function module_menus():BelongsToMany
	{
		$pivotTable = 'module_menu_tab';

		return $this->belongsToMany(ModuleMenu::class, $pivotTable, 'tab_id', 'module_menu_id');
	}
 }
