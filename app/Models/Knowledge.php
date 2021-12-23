<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Knowledge extends Model
{
	use HasDateTimeFormatter;
	
	public function tags(): BelongsToMany
	{
		// $pivotTable = 'knowledge_tag';
		// return $this->belongsToMany(Tag::class, $pivotTable, 'knowledge_id', 'tag_id');
		return $this->belongsToMany(Tag::class);
	}
}
