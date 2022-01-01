<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
	use HasDateTimeFormatter;    

	public function getHuobanLogo()
    {
        return $this->huoban_logo ? Storage::disk('oss')->url($this->huoban_logo) : '';
    }

	public function getShareImg()
    {
        return $this->share_img ? Storage::disk('oss')->url($this->share_img) : '';
    }

	public function getContactImg()
    {
        return $this->contact_img ? Storage::disk('oss')->url($this->contact_img) : '';
    }

	
}
