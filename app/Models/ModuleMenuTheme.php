<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ModuleMenuTheme extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'module_menu_theme';
    
}
