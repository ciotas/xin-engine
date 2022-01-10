<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class ModuleMenu extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'module_menus';

    protected $casts = [
        'tags_img' => 'json',
        'questions' => 'json'
    ];
    
    public function tabs(): BelongsToMany
	{
		$pivotTable = 'module_menu_tab';
		return $this->belongsToMany(Tab::class, $pivotTable, 'module_menu_id', 'tab_id')->withPivot('order')->orderByPivot('order');
	}

    public function getCover()
    {
        return $this->cover ? Storage::disk('oss')->url($this->cover) : '';
    }
    
    public function getBgImg()
    {
        return $this->bg_img ? Storage::disk('oss')->url($this->bg_img) : '';
    }
    public function getDotImg()
    {
        return $this->dot_img ? Storage::disk('oss')->url($this->dot_img) : '';
    }
    
    public function getTagsImg()
    {
        $data = [];
        if ($this->tags_img)
        {
            foreach($this->tags_img as $tag)
            {
                $data[] = Storage::disk('oss')->url($tag);
            }
        }
        
        return $data;
    }
    
    public function getVideoCover()
    {
        return $this->video_cover ? Storage::disk('oss')->url($this->video_cover) : '';
    }

    public function getVideoUrl()
    {
        if ($this->video_url) {
            if (!str_contains($this->video_url, 'http')) {
                return  Storage::disk('oss')->url($this->video_url);
            }
        }
        return $this->video_url;
    }
    
}
