<?php

namespace App\Http\Controllers\User\Api\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Api\Comment\CommentRequest;
use App\Models\Comment;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DB::table('comments')->paginate(4);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $request->merge(['user_id'=>Auth::guard('sanctum')->user()->id]);
        $store = Comment::create($request->all());

        $storeRate =  Rate::create([
            'user_id'=>Auth::guard('sanctum')->user()->id,
            'place_id'=>$request->place_id,
            'rate'=>$request->rate,
        ]);
        return response()->json([
            'data'=>[
                'message'=>'تم إضافة التعليق بنجاح',
            ],
            'statusCode'=>200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $update = Comment::find($id);
        $update->update($request->all());
        return response()->json([
            'data'=>[
                'message'=>'تم تعديل التعليق بنجاح',
            ],
            'statusCode'=>200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Comment::find($id);
        $delete->delete();
        return response()->json([
            'data'=>[
                'message'=>'تم حذف التعليق بنجاح',
            ],
            'statusCode'=>200,
        ]);
    }
}
