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
        return Storage::disk('oss')->url($this->banner);
    }

    public function getVideoCover()
    {
        return Storage::disk('oss')->url($this->video_cover);
    }

    public function getImage()
    {
        return Storage::disk('oss')->url($this->image);
    }
    
}
