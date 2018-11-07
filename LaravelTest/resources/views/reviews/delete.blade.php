@extends('layout')

@section('content')

    {!! Form::open(array('url' => 'reviews/'.$review->id, 'method' => 'DELETE')) !!}
    {!! Form::token() !!}

    <div class="form-group">
        {!! Form::label('title', 'title'); !!}<br>
        {!! Form::text('title', $review->title, array('class' => 'form-control', 'disabled' => 'disabled')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('username', 'username'); !!}<br>
        {!! Form::text('username', $review->username, array('class' => 'form-control', 'disabled' => 'disabled')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'body'); !!}<br>
        {!! Form::textarea('body', $review->body, array('class' => 'form-control', 'rows' => '3', 'disabled' => 'disabled')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('rating', 'rating'); !!}<br>
        {!! Form::text('rating', $review->rating, array('class' => 'form-control', 'disabled' => 'disabled')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit', array('class' => 'tablebutton')); !!}
        {!! Form::close() !!}
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


@endsection