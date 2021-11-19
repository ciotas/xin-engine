<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ModuleMenu extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'module_menus';

    protected $casts = [
        'tags_img' => 'json'
    ];
    
}
