<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MenuPage extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'menu_pages';
    
    public function getBanner()
    {
        return $this->banner ? Storage::disk('oss')->url($this->banner) : '';
    }

    public function getVideoCover()
    {
        return $this->video_cover ? Storage::disk('oss')->url($this->video_cover) : '';
    }

    public function getVideoUrl()
    {
        return $this->video_url ? Storage::disk('oss')->url($this->video_url) : '';
    }

    public function getImage()
    {
        return $this->image ? Storage::disk('oss')->url($this->image) : '';
    }
    
}
