<?php

namespace App\Http\Controllers\User\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Api\User\UserRequest;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authData = User::with('media')->find(Auth::guard('sanctum')->user()->id);
        if(!$authData){
            return response()->json([
                'data'=>[
                    'message'=>'عفوا يجب عليك تسجيل الدخول اولا',
                ],
                'statusCode'=>422,
            ]);
        }
        return response()->json([
            'data'=>$authData,
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
    public function show(string $id)
    {
         return User::with('media')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $update = User::find($id);
        $update->update($request->all());

        return response()->json([
            'data'=>[
                'message'=>'تم تعديل بيانات الحساب بنجاح',
            ],
            'statusCode'=>200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::find($id);
        if(!$delete){
            return response()->json([
                'data'=>[
                    'message'=>'عفوا الحساب غير موجود',
                ],
                'statusCode'=>200,
            ]);
        }
        $delete->delete();
        return response()->json([
            'data'=>[
                'message'=>'تم حذف الحساب بنجاح',
            ],
            'statusCode'=>200,
        ]);
    }


    public function updateAvatar(Request $request){
        $request->validate([
            'avatar'=>['required','mimes:png,jpg'],
        ]);

        $update = User::find(Auth::guard('sanctum')->user()->id);

        if($request->hasFile('avatar')){
            $update->clearMediaCollection('user');
            $update->addMedia($request->file('avatar'))
                  ->usingName($update->name)
                  ->toMediaCollection('user');
        }
        return response()->json([
            'data'=>[
                'message'=>'تم تعديل الصور بنجاح',
            ],
            'statusCode'=>200,
        ]);
    }

    public function changePassword(Request $request){
        $request->validate([
            'old_password'=>['required'],
            'new_password'=>['required','string'],
        ]);

        $updatePassword = User::find(Auth::guard('sanctum')->user()->id);
        if(!Hash::check($request->old_password,$updatePassword->password)){
            return response()->json([
                'data'=>[
                    'message'=>'عفوا كلمة السر القديمة غير صحيحة',
                ],
                'statusCode'=>422,
            ]);
        }
        $updatePassword->update([
            'password'=>Hash::make($request->new_password)
        ]);

        return response()->json([
            'data'=>[
                'message'=>'تم تغير كلمة السر بنجاح',
            ],
            'statusCode'=>200,
        ]);

    }
}
