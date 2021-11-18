<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
	use HasDateTimeFormatter;

    protected $fillable = ['link_id', 'name', 'alias', 'brief', 'image', 'audio', 'video'];
    public function link()
    {
        return $this->belongsTo(Link::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
