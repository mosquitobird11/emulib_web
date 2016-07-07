@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    @foreach ($games as $game)
        <p>{{$game->name}}</p>
    @endforeach
@endsection