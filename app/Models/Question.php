<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	use HasDateTimeFormatter;    
	protected $fillable = ['title', 'tags'];
}
