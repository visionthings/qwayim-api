<?php

namespace App\Http\Controllers\User\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Api\Auth\AuthRegisterRequest;
use App\Http\Requests\User\Api\Auth\AuthRequest;
use App\Http\Requests\User\Api\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    // Login Method
    public function login(AuthRequest $request){

        $getUser = User::where('email',$request->email)->first();
        if($getUser->status !='active'){
            return response()->json([
                'data'=>[
                    'message'=>'عفوا حسابك غير مفعل',
                ],
                'statusCode'=>422,
            ]);
        }
        if(!Hash::check($request->password,$getUser->password)){
            return response()->json([
                'data'=>[
                    'message'=>'البريد الإلكتروني أو كلمة المرور غير صحيحة',
                ],
                'statusCode'=>401,
            ]);
        }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $token = $getUser->createToken('authToken')->plainTextToken;

            return response()->json(['data'=>[
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user_data'=> $getUser,

            ],'statusCode'=>200]);
        }
    }

    // reigster new user method
    public function store(UserRequest $request){
        $store = User::create($request->all());

        if($request->hasFile('avatar')){
            $store->addMedia($request->file('avatar'))
                  ->usingName($store->name)
                  ->toMediaCollection('user');
        }else{
            $store->addMediaFromUrl('https://i.ibb.co/CMwJ3L2/unknownuser.png')
            ->usingName($store->name)
            ->toMediaCollection('user');
        }

        $token = $store->createToken('authToken')->plainTextToken;

        return response()->json(
            [
                'token' => $token,
                'user' => $store
            ]
        );
    }

    // logout

         public function logout(Request $request)
        {
            $user = User::where('id', $request->id)->first();
            $user->tokens()->delete();
            return response(['message' => 'تم تسجيل الخروج بنجاح'], 200);
        }
}
