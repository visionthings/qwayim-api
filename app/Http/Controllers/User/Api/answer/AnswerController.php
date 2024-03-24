<?php

namespace App\Http\Controllers\User\Api\answer;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Api\Answer\AnswerRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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
        $user = Auth::guard('sanctum')->user();
        $request->merge(['user_id' => $user->id,
            'profile_pic' => $user->media[0]->original_url,
            'username' => $user->name,]);
        $answer = Answer::create($request->all());

//        Send notification
        $question = Question::where('id', $request->question_id)->first();
        $receiver_user = User::where('id', $question->user_id)->first();
        $message = 'قام ' . $receiver_user->name . ' بالإجابة على سؤالك: ' . $question->question;
        $user_id = $receiver_user->id;
        $destination_id = $question->place_id;

        Notification::sendNow($receiver_user, new \App\Notifications\user($message, $user_id, $destination_id));
        return response()->json([
            'data' => ['message' => 'تم إضافة جوابك بنجاح', 'answer' => $answer],
            'statusCode' => 200,
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
