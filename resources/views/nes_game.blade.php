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
		{{$basic->long}} 
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
		<img src="{{asset('img/nes/'.$letter.'/nes_'.$assetname.'_Front.jpg')}}" width="250">
		@if ($basic->short)
			<h4>Summary</h4>
			<div class="side-section">
				<p>{{$basic->short}}</p>
			</div>
		@endif
		@if (count($releases) > 0)
			<h4>Releases</h4>
			<div class="side-section">
				@foreach ($releases as $release)
					<p>{{$release->region}}: {{jdmonthname($release->month,0)}} {{$release->day}}, {{$release->year}}</p>
				@endforeach
			</div>
		@endif
		<h4>Technical Info</h4>
		<div class="side-section">
			<li>Mapper Number: {{$specs->mapper_number}} </li>
			<li>Mapper Name: {{$specs->mapper_name}} </li>
			<li>PRG: {{$specs->chr}} </li>
			<li>CHR: {{$specs->prg}} </li>
			<li>Mirroring: {{$specs->mirroring == 1 ? 'Horizontal' : 'Vertical'}} </li>
		</div>
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