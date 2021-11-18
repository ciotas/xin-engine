<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class DocContent extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'doc_contents';

    protected $fillable = ['step_id', 'doc_id'];
    
    public function doc()
    {
        return $this->belongsTo(Doc::class);
    }
    
    public function step()
    {
        return $this->belongsTo(Step::class);
    }
}
