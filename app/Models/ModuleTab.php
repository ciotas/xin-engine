<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ModuleTab extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'module_tab';

    public function getVideoCover()
    {
        return $this->video_cover ? Storage::disk('oss')->url($this->video_cover) : '';
    }

    public function getVideoUrl()
    {
        return $this->video_url ? Storage::disk('oss')->url($this->video_url) : '';
    }
    
}
