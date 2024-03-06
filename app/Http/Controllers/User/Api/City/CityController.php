<?php

namespace App\Http\Controllers\User\Api\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::withCount('places')->with('media')->latest()->get();
        return response()->json([
            'data'=>$cities,
            'statusCode'=>200,
        ]);
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
    public function show(string $slug)
    {
        $city = City::with( 'media', 'news.media')->where('slug', $slug)->get();
        if(!$city){
            return response()->json([
                'data'=>['message'=>'عفوا المدينة غير موجودة'],
                'statusCode'=>422,
            ]);
        }
        return response()->json([
            'data'=>$city,
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
        $cities = City::with('media')->withCount('places')->where('name','like', '%' . $request->query('keyword') . '%')->get();
        foreach($cities as $city){
            $incrementSearchCount = City::find($city->id);
            $incrementSearchCount->increment('search_count');
        }
        if(!$cities->count()){
            return response()->json([
                'data'=>['message'=>'عفوا لا يوجد بيانات'],
                'statusCode'=>422,
            ]);
        }
        return response()->json([
            'data'=>$cities,
            'statusCode'=>200,
        ]);
    }
}
