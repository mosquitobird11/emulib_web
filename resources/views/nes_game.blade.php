@extends('layouts.master')

@section('title', $game->name)

@section('local_css')
	<link href="{{asset('css/nes_game.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="col-md-8">
		<h1>{{$game->name}} ({{$year}})</h1>
		<div>
		@if ($basic)
			{{$basic->long}} 
		@endif
		</div>

		@if (count($achievements) > 0)
		<h3>Achievements</h3>
			<table class="table table-bordered table-striped">
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Locked</th>
					<th>Unlocked</th>
				</tr>
				@foreach ($achievements as $achievement)
					<tr>
						<td>{{$achievement->name}}</td>
						<td>{{$achievement->description}}</td> 
						<td>
							<!-- Check if there is a locked picture for this specific achievement -->
							@if (file_exists(public_path('img/ach_'.$game->id.'_'.$achievement->id.'_locked.png')))
								<img src="{{asset('img/nes_achievements/ach_'.$game->id.'_'.$achievement->id.'_locked.png')}}">
							<!-- Check if there is a general locked picture for this game -->
							@elseif (file_exists(public_path('img/nes_achievements/ach_'.$game->id.'_locked.png')))
								<img src="{{asset('img/nes_achievements/ach_'.$game->id.'_locked.png')}}">
							<!-- Use Site-wide ach default locked picture -->
							@else
								<img src="{{asset('img/nes_achievements/ach_locked.png')}}">
							@endif
						</td>
						<td>
							<!-- Check if there is a unlocked picture for this specific achievement -->
							@if (file_exists(public_path('img/nes_achievements/ach_'.$game->id.'_'.$achievement->id.'_unlocked.png')))
								<img src="{{asset('img/nes_achievements/ach_'.$game->id.'_'.$achievement->id.'_unlocked.png')}}">
							<!-- Check if there is a general unlocked picture for this game -->
							@elseif (file_exists(public_path('img/nes_achievements/ach_'.$game->id.'_unlocked.png')))
								<img src="{{asset('img/nes_achievements/ach_'.$game->id.'_unlocked.png')}}">
							<!-- Use Site-wide ach default unlocked picture -->
							@else
								<img src="{{asset('img/nes_achievements/ach_unlocked.png')}}">
							@endif
						</td>
					</tr>
				@endforeach
			</table>
		@endif

		@if (count($cheats) > 0)
		<h3>Game Genie</h3>
			<table class="table table-bordered table-striped">
				<tr>
					<th>Name</th>
					<th>Code</th>
					<th>Description</th>
				</tr>
				@foreach ($cheats as $cheat)
					<tr>
						<td>{{$cheat->name}}</td>
						<td>{{$cheat->value}}</td>
						<td>{{$cheat->description}}</td>
					</tr>
				@endforeach
			</table>
		@endif
	</div>

	<div class="col-md-4 sidebar">
		<img src="{{$game->getDisplayImage('Front')}}" width="250">
		@if ($basic){
			@if ($basic->short)
				<h4>Description</h4>
				<div class="side-section">
					<p>{{$basic->short}}</p>
				</div>
			@endif
		@endif
		@if (count($releases) > 0)
			<h4>Releases</h4>
			<table class="table table-bordered table-striped">
				@foreach ($releases as $release)
					<tr>
						<td><img src='{{asset($release->getFlag())}}' ></img> {{$release->region}}</td>
						<td>{{jdmonthname($release->month,0)}} {{$release->day}}, {{$release->year}}</td>
					</tr>
				@endforeach
			</table>
		@endif
		@if($specs)
			<h4>Technical Info</h4>
			<table class="table table-bordered table-striped">
				<tr><td>Mapper Number</td><td>{{$specs->mapper_number}}</td></tr>
				<tr><td>Mapper Name</td><td>{{$specs->mapper_name}}</td></tr>
				<tr><td>PRG</td><td>{{$specs->chr}}</td></tr>
				<tr><td>CHR</td><td>{{$specs->prg}}</td></tr>
				<tr><td>Mirroring</td><td>{{$specs->mirroring == 1 ? 'Horizontal' : 'Vertical'}}</td></tr>
			</table>
		@endif
		@if (count($hashes) > 0)
		<h4>Known Hashes</h4>
			@foreach ($hashes as $hash)
			<div class="hashblock">
				<h5>{{$hash->variation_name}} - {{$hash->hash_type}}</h5>
				<p>{{$hash->hash}}</p>
				<p>{{$hash->description}}</p>
			</div>
			@endforeach
		@endif
	</div>
</div>
@endsection