<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
	use HasDateTimeFormatter;
    // use SoftDeletes;
    protected $fillable = ['user_id', 'name', 'push'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doc_contents()
    {
        return $this->hasMany(DocContent::class);
    }
}
