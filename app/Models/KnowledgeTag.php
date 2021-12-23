<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class KnowledgeTag extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'knowledge_tag';
    
}
