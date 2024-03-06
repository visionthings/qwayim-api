<?php

namespace App\Http\Controllers\User\Api\answer;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Api\Answer\AnswerRequest;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
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
    public function store(AnswerRequest $request)
    {
        $request->merge(['user_id'=>Auth::guard('sanctum')->user()->id]);
        $answer = Answer::create($request->all());
        return response()->json([
            'data'=>['message'=>'تم إضافة جوابك بنجاح'],
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
