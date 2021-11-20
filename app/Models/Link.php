<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Link extends Model
{
	use HasDateTimeFormatter;

    protected $fillable = ['cube_id', 'name', 'alias', 'brief', 'image', 'audio', 'video'];
    public function cube()
    {
        return $this->belongsTo(Cube::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

}
