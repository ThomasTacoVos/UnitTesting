@extends ('layout')

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


    @can('create reviews')
        {!! Form::open(array('url' => 'reviews', 'method' => 'POST')) !!}
        {!! Form::token() !!}
        <div class="form-group">
            <div class="">
                {!! Form::label('title', 'Title'); !!}<br>
                {!! Form::text('title', '', array('class' => '')) !!}
            </div>
            <div class="">
                {!! Form::label('username', 'Username'); !!}<br>
                {!! Form::text('username', Auth::user()->name, array('class' => '', 'disabled' => 'disabled')) !!}

                {!! Form::hidden('user_id', Auth::user()->id) !!}
            </div>
            <div class="">
                {!! Form::label('product', 'Product'); !!}<br>
                {!! Form::select('product_id', $products, null, ['placeholder' => 'Pick a product....']); !!}
            </div>
            <div class="">
                {!! Form::label('body', 'Body'); !!}<br>
                {!! Form::textarea('body', '', array('class' => '', 'rows' => '3')) !!}
            </div>
            <div class="">
                {!! Form::label('rating', 'Rating'); !!}<br>
                {!! Form::text('rating', '', array('class' => '')) !!}
            </div>
            <br>
            <div class="">
                {!! Form::submit('Submit', array('class' => '')); !!}<br>
                {!! Form::close() !!}
            </div>
        </div>


    @endcan


@endsection