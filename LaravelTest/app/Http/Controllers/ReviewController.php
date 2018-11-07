<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostReview;
use App\Http\Requests\UpdateReview;
use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create reviews', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit reviews', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete reviews', ['only' => ['delete', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviews = Review::all()->take(20);
        return view ('reviews.index', compact('reviews') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::pluck('name', 'id');
        return view ('reviews.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostReview $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostReview $request)
    {
        //
        $validated = $request->validated();

        $review = new Review();
        $review ->title = $request['title'];
        $review ->user_id = $request['user_id'];
        $review ->product_id = $request['product_id'];
        $review ->body = $request['body'];
        $review ->rating = $request['rating'];
        $review ->save();

        return redirect()->action('ReviewController@index')->with('correct', 'Review aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
        return view('reviews.show', compact('review'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
        $products = Product::pluck('name', 'id');
        return view('reviews.edit', compact('review', 'products' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReview $request, Review $review)
    {
        //
        $validated = $request->validated();

        $review->title = $request['title'];
        $review->product_id = $request['product_id'];
        $review->body = $request['body'];
        $review->rating = $request['rating'];
        $review->save();

        return redirect()->action('ReviewController@index')->with('correct', 'Review gewijzigd');
    }

    public function delete(Review $review) {
        return view('reviews.delete', compact('review'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
        $review->delete();

        return redirect ()->action('ReviewController@index')->with('correct', 'Review verwijderd');
    }
}
