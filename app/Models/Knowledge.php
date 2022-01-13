<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Knowledge extends Model
{
	use HasDateTimeFormatter, Searchable;
	
	public function searchableAs()
    {
        return 'knowledge_index';
    }

	public function toSearchableArray()
    {
        $array = $this->toArray();
		$array['content'] = strip_tags($array['content']);
		$tagnames = array_column($array['tags'], 'name');
		$array['tags'] = implode(',', $tagnames);
        return $array;
    }

	public function tags(): BelongsToMany
	{
		return $this->belongsToMany(Tag::class);
	}

	protected function makeAllSearchableUsing($query)
    {
        return $query->with('tags');
    }
}
