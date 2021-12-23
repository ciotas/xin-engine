<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
	use HasDateTimeFormatter;  

	public function knowledges(): BelongsToMany
	{
		return $this->belongsToMany(Knowledge::class);
	}
}
