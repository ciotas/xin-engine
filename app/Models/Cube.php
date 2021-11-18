<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Cube extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'cubes';
    protected $fillable = ['name', 'module_id'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }
    
}
