<?php

namespace App\Http\Controllers\User\Api\Place;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Place;
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
        $place = Place::with('contact','comments','questions.answers','feature','city','category')->find($id);
        $place->increment('view');
        $place->getMedia();
        return response()->json([
            'data'=>$place,
            'statusCode'=>200,
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

    public function search(Request $request){
        $palces = Place::with('contact','comments','questions','feature','city','category')->where('name','like', '%' . $request->query('keyword') . '%')->get();
        foreach($palces as $palce){
            $incementSearchCount = Place::find($palce->id);
            $incementSearchCount->increment('search_count');
        }
        if(!$palces->count()){
            return response()->json([
                'data'=>['message'=>'عفوا لا يوجد بيانات'],
                'statusCode'=>422,
            ]);
        }
        return response()->json([
            'data'=>$palces,
            'statusCode'=>200,
        ]);
    }

    public function topPlaces(){
        $topPlaces = Category::with(['places'=>fn($q)=>$q->with('media')->orderBy('search_count','DESC')->take(20)])->get();
        return response()->json([
            'data'=>$topPlaces,
            'statusCode'=>200,
        ]);
    }
}
