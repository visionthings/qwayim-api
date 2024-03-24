<?php

namespace App\Http\Controllers\User\Api\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::with(['place'=>fn($q)=>$q
                              ->with('media','category','comments','city','feature','contact','questions','suggestions')])
                              ->where('user_id',Auth::guard('sanctum')->user()->id)
                              ->where('status','user')
                              ->whereNotNull('place_id')
                              ->latest()
                              ->get();

        return response()->json([
            'data'=>$favorites,
            'statusCode'=>200,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $checkIFPlaceExist = Favorite::where('place_id',$request->place_id)
                                       ->where('user_id',Auth::guard('sanctum')->user()->id)
                                       ->first();
        if($checkIFPlaceExist){
            return response()->json([
                'data'=>['message'=>'هذه الوجهة مضافة بالفعل إلى قائمة المفضلة الخاصة بك.'],
                'statusCode'=>422,
            ]);
        }
        $store = Favorite::create([
            'user_id'=>Auth::guard('sanctum')->user()->id,
            'place_id'=>$request->place_id,
            'status'=>'user',
        ]);
        return response()->json([
            'data'=>['message'=>'تم إضافة المكان الي المفضلات بنجاح'],
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
        $delete = Favorite::where('place_id',$id)
                            ->where('user_id',Auth::guard('sanctum')->user()->id)
                            ->first();
        $delete->delete();
        return response()->json([
            'data'=>['message'=>'تم حذف المكان من المفضلات بنجاح'],
            'statusCode'=>200,
        ]);
    }
}
