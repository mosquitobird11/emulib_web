@extends('layouts.master')

@section('title', 'Games List')

@section('content')
    <h2>NES</h2>
    @foreach ($nes_games as $nes_game)
        <a href="{{url('game/3')}}"><p>{{$nes_game->name}}</p></a>
    @endforeach
@endsection