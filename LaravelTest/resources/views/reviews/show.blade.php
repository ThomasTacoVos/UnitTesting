@extends('layout')

@section('content')

<div class="col-md-4">
    <h2>{{$review->title}}</h2>
    <h4>User: {{$review->username}}</h4>
    <p>{{$review->body}}</p>
    <p>Rating: {{$review->rating}}</p>
</div>

@endsection