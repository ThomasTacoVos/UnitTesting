@extends('layout')
@section('content')

    {{------------------Links to other cruds---------------------------------------------}}
    <a href="/reviews">
        <button type="button" class="btn btn-dark">To reviews</button>
    </a>

    @can('create products')
        <a href="/products">
            <button type="button" class="btn btn-dark">To products</button>
        </a>
    @endcan

    <a href="/users">
        <button type="button" class="btn btn-dark">To users</button>
    </a>

    <a href="{{URL::to('reviews/create')}}">
        <button type="button" class="btn btn-dark">Create a new review</button>
    </a>
    {{-----------------------------------------------------------------------------------}}
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <br>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Edit</th>
            @can('delete products')
                <th scope="col">Delete</th>
            @endcan
        </tr>
        </thead>
        @foreach($products as $product)
            <tbody>
            <tr>

                <td>{{$product->name}} </td>
                <td>{{$product->description}}</td>
                <td>    @can('edit products')
                        <a href="products/{{$product->id}}/edit">
                            <button class="btn btn-success" type="submit">Edit</button>
                        </a>
                    @endcan
                </td>
                <td>    @can('delete products')
                        {{ Form::open(array('url' => 'products/'.$product->id,  'class' => '')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    @endcan
                </td>
            </tr>
            </tbody>
        @endforeach


    </table>
@endsection