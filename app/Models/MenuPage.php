<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'menu_pages';
    
}
