@extends('layouts.master')

@section('title', $game->name)

@section('content')
	<h1>{{$game->name}}</h1>

	<image src="{{asset('img/'.$main_art->filename)}}" width=250/>

	<h3>Basic Info</h3>
	<ul>
		<li>Short: {{$basic->short}} </li>
		<li>Long: {{$basic->long}} </li>
	</ul>

	<h3>Technical Info</h3>
	<ul>
		<li>Mapper Number: {{$specs->mapper_number}} </li>
		<li>Mapper Name: {{$specs->mapper_name}} </li>
		<li>PRG: {{$specs->chr}} </li>
		<li>CHR: {{$specs->prg}} </li>
		<li>Mirroring: {{$specs->mirroring == 1 ? 'Horizontal' : 'Vertical'}} </li>
	</ul>

	<h3>Hashes</h3>
		@foreach ($hashes as $hash)
		<ul>
			<li>{{$hash->variation_name}}</li>
			<li>{{$hash->hash_type}}: {{$hash->hash}}</li>
			<li>{{$hash->description}}
		</ul>
		@endforeach

	<h3>Game Genie</h3>
		<table>
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
				</td>
			@endforeach
		</table>

	<h3>Achievements</h3>
		<table>
			<tr>
				<th>Name</th>
				<th>Description</th>
			</tr>
			@foreach ($achievements as $achievement)
				<tr>
					<td>{{$achievement->name}}</td>
					<td>{{$achievement->description}}</td>
				</td>
			@endforeach
		</table>	
@endsection