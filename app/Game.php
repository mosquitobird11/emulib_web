<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function arts()
    {
        return $this->hasMany('App\Art');
    }

    public function type(){
    	return $this->belongsTo('App\Type');
    }

    //A robust function for returning display images (front, side, back, physical media, etc. (not screenshots))
    public function getDisplayImage($kind){
		//Get first letter of name for discovering related assets
		if (is_numeric($this->name[0])){
		    $letter = '1';
		}else{
		    $letter = strtolower($this->name[0]);
		}

		//Get asset name
        $assetname = str_replace('&', 'and', $this->name);
        $assetname = str_replace('-', ' ', $assetname);
		$assetname = preg_replace("/[^A-Za-z0-9 ]/",'',$assetname);
        $assetname = strtolower($assetname);
        $assetname = str_replace(' the', '', $assetname);
		$assetname = str_replace(' ', '-', $assetname);

		//NES
		if ($this->type->name == 'NES'){
			$fullPath = 'img/nes/'.$letter.'/nes_'.$assetname.'_'.$kind.'.jpg';
			If (file_exists(public_path($fullPath))){
    			return asset($fullPath);
    		}else{
    			//return asset('img/nes/nes_'.$kind.'.jpg');
                return asset($fullPath);
    		}
    	}
    }

}
