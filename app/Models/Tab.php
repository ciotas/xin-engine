<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tab extends Model
{
	use HasDateTimeFormatter;   

	protected $casts = [
		'features' => 'json',
		'cards'=> 'json',
		'prictice_points'=> 'json'
	];

	public function getPricticeVideoCover()
	{
		return $this->prictice_video_cover ? Storage::disk('oss')->url($this->prictice_video_cover) : ''; 
	}

	public function getCards()
    {
        $data = [];
		if ($this->cards) {
			foreach($this->cards as $card)
			{
				$data[] = Storage::disk('oss')->url($card);
			}
		}
        return $data;
    }
	
 }
