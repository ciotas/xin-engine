<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ModuleStatistic extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'module_statistics';
    protected $fillable = ['module_menu_id'];
    
}
