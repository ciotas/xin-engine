<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	use HasDateTimeFormatter;

    protected $fillable = ['name'];
    
    public function cubes()
    {
        return $this->hasMany(Cube::class);
    }
}
