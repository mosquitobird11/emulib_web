@extends('layouts.master')

@section('title', 'Games List')

@section('local_css')
	<link href="{{asset('css/games.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h2 class="listhead">NES</h2>
    <div class="row">
    @foreach ($nes_games as $nes_game)
    <div class="col-sm-6 col-md-3 gameCard">
		<a href="{{url('game/'.$nes_game->id)}}">
		<div class="thumbnail">
			<img src="{{$nes_game->getDisplayImage('Front')}}" width=250/>
			<div class="caption">
				<span>
				<?php 
					$possessives = $nes_game->getPossessives();
					$articles = $nes_game->getArticles();
				 ?>
				@if (!empty($possessives))
					<span class="article">{{$possessives[0]}}</span>
				@endif
				@if (!empty($articles))
					<span class="article">{{$articles[0]}}</span>
				@endif
				@if (!empty($possessives)||!empty($articles))
					<br>
				@endif
				{{$nes_game->getDisplayName()}}
				</span>
			</div>
		</div>
		</a>
	</div>
    @endforeach
	</div>
</div>
@endsection