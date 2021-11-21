<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Theme extends Model
{
	use HasDateTimeFormatter;   

	protected $fillable = ['title', 'brief'];

	public function module_menus(): BelongsToMany
	{
		$pivotTable = 'module_menu_theme';
		return $this->belongsToMany(ModuleMenu::class, $pivotTable, 'theme_id', 'module_menu_id');
	}
}
