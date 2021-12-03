<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomePage extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'home_pages';
    // protected $fillable = ['banners', 'service_items', 'service_steps', 'brief', 'examples'];
    
    protected $casts = [
        'banners' => 'json',
        'examples' => 'json'
    ];

    public function getBanners()
    {
        $data = [];
        if ($this->banners) {
            foreach($this->banners as $banner)
            {
                $data[] = Storage::disk('oss')->url($banner);
            }
        }
    
        return $data;
    }
    public function getExamples()
    {
        $data = [];
        if ($this->examples)
        {
            foreach($this->examples as $example)
            {
                $data[] = Storage::disk('oss')->url($example);
            }
        }
        
        return $data;
    }
    public function getCaseBg()
    {
        return $this->case_bg?Storage::disk('oss')->url($this->case_bg):'';
    }
    public function getBrief()
    {
        return $this->brief ? Storage::disk('oss')->url($this->brief) : '';
    }
    public function getServiceItems()
    {
        return $this->service_items ? Storage::disk('oss')->url($this->service_items) : '';
    }
    public function getServiceSteps()
    {
        return $this->service_steps ? Storage::disk('oss')->url($this->service_steps) : '';
    }

    
}
