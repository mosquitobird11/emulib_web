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

        $assetname = $this->getAssetName($this->name);

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

    private function getAssetName($name){
        //Strip articles
        $assetname = preg_replace("/\[[a-zA-Z]*\]/", '', $name);
        //Strip possessives
        $assetname = preg_replace("/\{[a-zA-Z\s']*\}/", '', $assetname);
        //Replace ampersand with alphabetic characters
        $assetname = str_replace('&', 'and', $assetname);
        //Remove dashes from title
        $assetname = str_replace('-', ' ', $assetname);
        //Strip all non-alphanumeric symbols
        $assetname = preg_replace("/[^A-Za-z0-9 ]/",'',$assetname);
        //Lowercase only
        $assetname = strtolower($assetname);
        //Remove multiple whitespaces and replace with a single space
        $assetname = preg_replace('!\s+!', ' ', $assetname);
        //Clean whitespace from edges
        $assetname = trim($assetname);
        //Turn spaces into dashes
        $assetname = str_replace(' ', '-', $assetname);

        return $assetname;
    }

    public function getDisplayName(){
        //Strip articles
        $display = preg_replace("/\[[a-zA-Z]*\]/", '', $this->name);
        //Strip possessives
        $display = preg_replace("/\{[a-zA-Z\s']*\}/", '', $display);
        return $display;
    }

    public function getArticles(){
        $temp = $this->name;
        $matches = [];
        preg_match("/\[[a-zA-Z]*\]/", $temp, $matches);
        $matches_clean = [];
        foreach ($matches as $match){
            $matches_clean[] = substr($match, 1, -1);
        }
        return $matches_clean;
    }

    public function getPossessives(){
        $temp = $this->name;
        $matches = [];
        preg_match("/\{[a-zA-Z\s']*\}/", $temp, $matches);
        $matches_clean = [];
        foreach ($matches as $match){
            $matches_clean[] = substr($match, 1, -1);
        }
        return $matches_clean;
    }

}
