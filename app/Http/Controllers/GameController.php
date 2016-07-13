<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Game;
use App\Type;
use App\NesBasic;
use App\NesSpecs;
use App\NesHash;
use App\NesCheat;
use App\NesAchievement;
use App\NesRelease;
use App\Art;

class GameController extends Controller
{
    public function index(){
    	//Get Types
    	$NES = Type::where('name','=','NES')->first();

    	//Get Games by type
    	$nes_games = Game::where('type_id','=',$NES->id)->orderBy('name')->get();

    	//Return list view of games
    	return view('games', ['nes_games' => $nes_games]);
    }

    public function show($id){
    	//Game
    	$game = Game::find($id);
    	//Determine type
    	$NES = Type::where('name','=','NES')->first();

    	//NES GAMES
    	if ($game->type_id == $NES->id){
    		//Get basic info
    		$basic = NesBasic::where('game_id','=',$game->id)->first();

    		//Get Tech specs
    		$specs = NesSpecs::where('game_id','=',$game->id)->first();

    		//Get Nes Hashes
    		$hashes = NesHash::where('game_id','=',$game->id)->get();

    		//Get Nes Cheats
    		$cheats = NesCheat::where('game_id','=',$game->id)->get();

    		//Get Nes Achievements
    		$achievements = NesAchievement::where('game_id','=',$game->id)->get();

            //Get releases
            $years = NesRelease::where('game_id','=',$game->id)->orderBy('year')->first();
            if (!empty($years)){
                $year = $years->year;
            }else{
                $year = "----";
            }
            $releases = NesRelease::where('game_id','=',$game->id)->get();

    		return view('nes_game', [
    			'game' => $game,
    			'basic' => $basic,
    			'specs' => $specs,
    			'hashes' => $hashes,
    			'achievements' => $achievements,
    			'cheats' => $cheats,
                'year' => $year,
                'releases' => $releases
    		]);
    	}

    }
}
