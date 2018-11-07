@extends('layout')
@section('content')

    <button class="tablebutton" type="submit"><a href="/reviews">To reviews</a></button>
    @can('create products')
    <button class="tablebutton" type="submit"><a href="/products">To products</a></button>
    @endcan
    <button class="tablebutton" type="submit"><a href="/users">To users</a></button>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <br>
            <th scope="col">Title</th>
            <th scope="col">Productname</th>
            <th scope="col">Username</th>
            <th scope="col">Body</th>
            <th scope="col">Rating</th>

            @can('delete reviews')
                <th scope="col">Edit</th>
            @endcan

            @can('delete reviews')
                <th scope="col">Delete</th>
            @endcan
        </tr>
        </thead>
        @foreach($reviews as $review)
            <tbody>
            <tr>

                <td>{{$review->title}} </td>
                <td>{{$review->product->name}}</td>
                <td>{{$review->user->name}} </td>
                <td>{{$review->body}}</td>
                <td>{{$review->rating}}</td>
                <td>    @can('edit reviews')
                        <a href="reviews/{{$review->id}}/edit">
                            <button class="btn btn-success" type="submit">Edit</button>
                        </a>
                    @endcan
                </td>
                <td>    @can('delete reviews')
                        {{ Form::open(array('url' => 'reviews/'.$review->id,  'class' => '')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    @endcan
                    @endforeach
                </td>
            </tr>
            </tbody>
    </table>
@endsection
