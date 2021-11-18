<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
	use HasDateTimeFormatter;

    protected $fillable = ['name', 'brief', 'image', 'audio', 'video'];

    public function step()
    {
        return $this->belongsTo(Step::class);
    }
}
