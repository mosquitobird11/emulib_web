<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Game;

class GameController extends Controller
{
    public function index(){
    	$games = Game::all();
    	return view('games', ['games' => $games]);
    }
}
