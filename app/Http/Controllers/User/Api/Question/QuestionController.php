<?php

namespace App\Http\Controllers\User\Api\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Api\Question\QuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
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
    public function store(QuestionRequest $request)
    {
        $request->merge(['user_id'=>Auth::guard('sanctum')->user()->id]);
        $question = Question::create($request->all());
        return response()->json([
            'data'=>['message'=>'تم إضافة سوالك بنجاح'],
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
