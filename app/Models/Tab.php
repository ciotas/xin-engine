<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
	use HasDateTimeFormatter;   

	protected $casts = [
		'features' => 'json'
	];
 }
