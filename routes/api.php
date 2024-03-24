<?php

use App\Http\Controllers\User\Api\answer\AnswerController;
use App\Http\Controllers\User\Api\Auth\AuthController;
use App\Http\Controllers\User\Api\Category\CategoryController;
use App\Http\Controllers\User\Api\City\CityController;
use App\Http\Controllers\User\Api\Comment\CommentController;
use App\Http\Controllers\User\Api\Favourite\FavouriteController;
use App\Http\Controllers\User\Api\Place\PlaceController;
use App\Http\Controllers\User\Api\Question\QuestionController;
use App\Http\Controllers\User\Api\User\UserController;
use App\Http\Controllers\User\Api\Vist\VistController;
use App\Models\Place;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//************************************************************************************** */
// Guest Route
// Auth
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'store']);
Route::post('logout', [AuthController::class, 'logout']);

//************************************************************************************** */
// Auth Route
// user
Route::group(['middleware' => 'auth:sanctum'], function () {

    //user
    Route::post('/users/update/avatar', [UserController::class, 'updateAvatar']);
    Route::post('/users/change/password', [UserController::class, 'changePassword']);
    Route::apiResource('users', UserController::class)->except('show');
    Route::post('/notifications', [UserController::class, 'read_notification']);
    Route::get('/notifications', [UserController::class, 'get_notifications']);

    //favorites
    Route::apiResource('favorites', FavouriteController::class);

    //question
    Route::apiResource('questions', QuestionController::class);

    //answer
    Route::apiResource('answers', AnswerController::class);
});

// city
Route::get('cities/search', [CityController::class, 'search']);
Route::apiResource('cities', CityController::class);

// category
Route::get('categories/{city_id}/{cat_id}', [CategoryController::class, 'show']);
Route::post('categories/{city_id}/{cat_id}', [CategoryController::class, 'filter']);
Route::apiResource('categories', CategoryController::class)->except('show');

//comments
Route::apiResource('comments', CommentController::class);

//place
Route::get('places/search', [PlaceController::class, 'search']);
Route::get('top/places', [PlaceController::class, 'topPlaces']);
Route::apiResource('places', PlaceController::class);
Route::get('place-comments/{id}', [PlaceController::class, 'get_place_comments']);
Route::get('place-questions/{id}', [PlaceController::class, 'get_place_questions']);

//Vist
Route::apiResource('vists', VistController::class);
Route::get('users/{id}', [UserController::class, 'show']);


//************************************************************************************** */
