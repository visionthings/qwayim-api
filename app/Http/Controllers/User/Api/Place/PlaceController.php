<?php

namespace App\Http\Controllers\User\Api\Place;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Place;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $place = Place::with('contact', 'comments', 'questions.answers', 'feature', 'city', 'category')->find($id);
        $place->increment('view');
        $place->getMedia();
        $city = City::find($place->city_id);
        $category = Category::find($place->category_id);
        $city_name = $city->name;
        $city_slug = $city->slug;
        $category = $category;
        $place->city_name = $city_name;
        $place->city_slug = $city_slug;
        $place->category = $category;

        return response()->json([
            'data' => $place,
            'statusCode' => 200,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $palces = Place::with('contact', 'comments', 'questions', 'feature', 'city', 'category', 'media')->where('name', 'like', '%' . $request->query('keyword') . '%')->get();
        foreach ($palces as $palce) {
            $incementSearchCount = Place::find($palce->id);
            $incementSearchCount->increment('search_count');
        }
        if (!$palces->count()) {
            return response()->json([
                'data' => [],
                'statusCode' => 422,
            ]);
        }
        return response()->json([
            'data' => $palces,
            'statusCode' => 200,
        ]);
    }

    public function topPlaces()
    {
        $topPlaces = Category::with(['places' => fn($q) => $q->with('media', 'comments')->latest()])->take(5)->get();
        return response()->json([
            'data' => $topPlaces,
            'statusCode' => 200,
        ]);
    }

//    Get place comments
    public function get_place_comments(string $id)
    {
        $comments = Comment::where('place_id', $id)->get();
        foreach ($comments as $comment) {
            $user = User::find($comment->user_id);
            $user_profile_pic = $user->media[0]->original_url;
            $comment->profile_pic = $user_profile_pic;
        }
        return response(['comments' => $comments], 200);
    }

//  Get place questions with answers
    public function get_place_questions(string $id)
    {
        $questions = Question::where('place_id', $id)->with('answers')->get();
        foreach ($questions as $question) {
            $user = User::find($question->user_id);
            $user_profile_pic = $user->media[0]->original_url;
            $question->profile_pic = $user_profile_pic;

            foreach ($question->answers as $answer) {
                $user = User::find($answer->user_id);
                $user_profile_pic = $user->media[0]->original_url;
                $answer->profile_pic = $user_profile_pic;
            }
        }
        return response(['questions' => $questions], 200);

    }

}
