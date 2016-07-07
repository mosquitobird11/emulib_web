@extends('layouts.master')

@section('title', $game->name)

@section('content')
	<h1>{{$game->name}}</h1>

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
@endsection