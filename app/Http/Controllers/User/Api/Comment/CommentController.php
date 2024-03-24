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
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $user = Auth::guard('sanctum')->user();
        $request->merge(
            [
                'user_id'=>$user->id,
                'profile_pic'=>$user->media[0]->original_url,
                'username'=>$user->name,
            ]
        );
        $comment = Comment::create($request->all());

        return response()->json([
            'data'=>[
                'message'=>'تم إضافة التعليق بنجاح',
                'comment'=>$comment,
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
