@extends('layout')

<a href="/products">Naar products</a>
<a href="/users">Naar users</a>

@section('content')

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

                <td>{{$product->body}}</td>
                <td>{{$product->rating}}</td>

            </tr>
            </tbody>

            {{--<a href="#" class="show-link">--}}

            <h4>{{$product->name}}</h4>
            <p>{{$product->description}}</p>

            {{--</a>--}}

        @endforeach

        <a href="{{URL::to('products/create')}}">
            <button class="tablebutton" type="submit">Create a new Product</button>
        </a>
        </div>
    </table>
    @endsection