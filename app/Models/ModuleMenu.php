<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ModuleMenu extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'module_menus';

    protected $casts = [
        'tags_img' => 'json'
    ];
    
    public function tabs(): BelongsToMany
	{
		$pivotTable = 'module_menu_tab';
		return $this->belongsToMany(Tab::class, $pivotTable, 'module_menu_id', 'tab_id');
	}
}
