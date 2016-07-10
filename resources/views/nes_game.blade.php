@extends('layouts.master')

@section('title', $game->name)

@section('local_css')
	<link href="{{asset('css/nes_game.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="col-md-8">
		<h1>{{$game->name}}</h1>
		<div>
		{{$basic->long}} 
		</div>

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

		<h3>Achievements</h3>
			<table class="table table-bordered table-striped">
				<tr>
					<th>Name</th>
					<th>Description</th>
				</tr>
				@foreach ($achievements as $achievement)
					<tr>
						<td>{{$achievement->name}}</td>
						<td>{{$achievement->description}}</td>
					</tr>
				@endforeach
			</table>
	</div>

	<div class="col-md-4 sidebar">
		<img src="{{asset('img/'.$main_art->filename)}}" width="250"></img>
		<h4>Summary</h4>
		<div class="side-section">
			<p>{{$basic->short}}</p>
		</div>
		<h4>Technical Info</h4>
		<div class="side-section">
			<li>Mapper Number: {{$specs->mapper_number}} </li>
			<li>Mapper Name: {{$specs->mapper_name}} </li>
			<li>PRG: {{$specs->chr}} </li>
			<li>CHR: {{$specs->prg}} </li>
			<li>Mirroring: {{$specs->mirroring == 1 ? 'Horizontal' : 'Vertical'}} </li>
		</div>
		<h4>Hashes</h4>
			@foreach ($hashes as $hash)
			<div class="hashblock">
				<h5>{{$hash->variation_name}} - {{$hash->hash_type}}</h5>
				<p>{{$hash->hash}}</p>
				<p>{{$hash->description}}</p>
			</div>
			@endforeach
	</div>
</div>
@endsection