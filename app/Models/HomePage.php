<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'home_pages';
    protected $fillable = ['banners', 'service_items', 'service_steps', 'brief', 'examples'];
    
    protected $casts = [
        'banners' => 'json',
        'examples' => 'json'
    ];
}
