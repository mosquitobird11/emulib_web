<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NesRelease extends Model
{
    public function getFlag(){
		if ($this->region == 'North America'){
			$flag = 'usa';
		}
		else if ($this->region == 'PAL'){
			$flag = 'europeanunion';
		}
		else{
			$flag = file_exists(asset('img/flags/flag-').$this->region.'png') ? $this->region : 'unknown';
		}
		$flag = 'img/flags/flag-'.$flag.'.png';
		return $flag;
    }
}
