@extends('layout')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @can('edit reviews')
    {!! Form::open(array('url' => 'reviews/'.$review->id, 'method' => 'PATCH')) !!}
    {!! Form::token() !!}


    {{-- Title --}}
    <div class="form-group">
        {!! Form::label('title', 'title'); !!}<br>
        {!! Form::text('title', $review->title, array('class' => 'form-control')) !!}
    </div>

    {{-- Username --}}
    <div class="form-group">
        {!! Form::label('username', 'username'); !!}<br>
        {!! Form::text('username', $review->user->name, array('class' => 'form-control', 'disabled' => 'disabled')) !!}
    </div>

    {{-- Product id--}}
    <div class="form-group">
        {!! Form::label('product', 'Product'); !!}<br>
        {!! Form::select('product_id', $products, $review->product->id, array_merge(['class' => 'form-control', 'placeholder' => 'Pick a product....'])); !!}
    </div>

    {{-- Body of the review--}}
    <div class="form-group">
        {!! Form::label('body', 'body'); !!}<br>
        {!! Form::textarea('body', $review->body, array('class' => 'form-control', 'rows' => '3')) !!}
    </div>

    {{-- Rating of the product--}}
    <div class="form-group">
        {!! Form::label('rating', 'rating'); !!}<br>
        {!! Form::text('rating', $review->rating, array('class' => 'form-control')) !!}
    </div>

    {{-- Submit --}}
    <div class="form-group">
        {!! Form::submit('Submit', array('class' => 'tablebutton')); !!}
        {!! Form::close() !!}
    </div>
@endcan


@endsection

