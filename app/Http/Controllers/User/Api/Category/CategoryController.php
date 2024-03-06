<?php

namespace App\Http\Controllers\User\Api\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Place;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('catfilters')->withCount('places')->latest()->get();
        return response()->json([
            'data'=>$categories,
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
    public function show(string $city_id,$cat_id)
    {
        $categoryPlaces = Place::with('city','media','feature','category')->where('city_id',$city_id)->where('category_id',$cat_id)->latest()->get();
        if(!$categoryPlaces->count()){
            return response()->json([
                'data'=>[
                    'message'=>'عفوا البيانات غير موجودة'
                ],
                'statusCode'=>422,
            ]);
        }
        return response()->json([
            'data'=>$categoryPlaces,
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
}
