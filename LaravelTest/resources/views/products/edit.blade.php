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
        {!! Form::open(['url' => '/products/'.$product->id, 'method' => 'PATCH']) !!}

        <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        <!--<label for="exampleInputEmail1">Email address</label>-->

        {!!  Form::text('name', $product->name, array_merge(['class' => 'form-control', 'id' => 'name'])) !!}
        <!--<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">-->
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!!  Form::textarea('description', $product->description, array_merge(['class' => 'form-control', 'id' => 'description'])) !!}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        {!! Form::close() !!}
    @endcan
@endsection

