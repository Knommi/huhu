<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rating;
use App\Http\Resources\RatingResource;
class RatingController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api');
    }
    public function store(Request $request, Book $cook)
    {
      $rating = Rating::firstOrCreate(
        [
          'user_id' => $request->user()->id,
          'book_id' => $cook->id,
        ],
        ['rating' => $request->rating]
      );

      return new RatingResource($rating);
    }
}
