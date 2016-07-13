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

        $assetname = cleanName($name);

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

    private function cleanName($name){
        //Replace ampersand with alphabetic characters
        $assetname = str_replace('&', 'and', $name);
        //Remove dashes from title
        $assetname = str_replace('-', ' ', $assetname);
        //Strip all non-alphanumeric symbols
        $assetname = preg_replace("/[^A-Za-z0-9 ]/",'',$assetname);
        //Lowercase only
        $assetname = strtolower($assetname);
        //REWORK
        $assetname = str_replace(' the', '', $assetname);
        //Remove multiple whitespaces and replace with a single space
        $assetname = preg_replace('!\s+!', ' ', $assetname);
        //Turnspaces into dashes
        $assetname = str_replace(' ', '-', $assetname);

        return $assetname;
    }

}
