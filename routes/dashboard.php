<?php

use App\Http\Controllers\Dashboard\Web\Auth\AuthController;
use App\Http\Controllers\Dashboard\Web\Category\CategoryController;
use App\Http\Controllers\Dashboard\Web\City\CityController;
use App\Http\Controllers\Dashboard\Web\Comment\CommentController;
use App\Http\Controllers\Dashboard\Web\Home\HomeController;
use App\Http\Controllers\Dashboard\Web\Message\MessageController;
use App\Http\Controllers\Dashboard\Web\Report\ReportController;
use App\Http\Controllers\Dashboard\Web\Saved\SavedController;
use App\Http\Controllers\Dashboard\Web\Setting\AdminController;
use App\Http\Controllers\Dashboard\Web\Setting\BlockController;
use App\Http\Controllers\Dashboard\Web\Setting\NotificationController;
use App\Http\Controllers\Dashboard\Web\Subscription\SubscriptionController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'dashboard'],function(){
//**************************************************************************************/
//Guest Routes
    Route::get('login',[AuthController::class,'loginView'])
          ->name('dashboard.login.view');
    Route::post('login',[AuthController::class,'lgoinMethod'])
            ->name('dashboard.login');

  Route::group(['middleware'=>'auth:admin'],function(){
    //**************************************************************************************/
    //Auth Routes
    //**************************************************************************************/

        // home
        Route::get('/',[HomeController::class,'index'])->name('home');
    //**************************************************************************************/
    // city, news and places

        Route::get('cities/place/create/{id}',[CityController::class,'CityCreatePlaceView'])
                ->name('cities.place.create');
        Route::post('cities/place/store',[CityController::class,'storePlace'])
                ->name('cities.place.store');

        Route::get('cities/place/edit/{id}',[CityController::class,'editPlaceView'])
                ->name('cities.place.edit.view');

        Route::put('cities/place/update/{id}',[CityController::class,'updatePlace'])
                ->name('cities.place.update');

        // News
        Route::get('cities/news/create/{id}',[CityController::class,'CityCreateNewsView'])
                ->name('cities.news.create');
        Route::post('cities/news/store',[CityController::class,'storeNews'])
                ->name('cities.news.store');

        Route::get('cities/news/edit/{id}',[CityController::class,'editNewsView'])
                ->name('cities.news.edit.view');

        Route::put('cities/news/update/{id}',[CityController::class,'updateNews'])
                ->name('cities.news.update');

        Route::get('/city/cat/show/{cat_id}/{city_id}', [CityController::class,'cityCatShowView'])
                ->name('city.cat.show.view');
        Route::resource('cities',CityController::class);
    //**************************************************************************************/

        // comments
        Route::resource('/comments',CommentController::class);
    //**************************************************************************************/

        // contact us ( messages )
        Route::resource('/messages',MessageController::class);
    //**************************************************************************************/
    // subscriptions
        Route::get('/subscriptions/profile/{id}',[SubscriptionController::class,'subscriperProfile'])
            ->name('subscriper.profile');
        // Route::get('/subscriptions/profile/block/{id}',[SubscriptionController::class,'subscriperProfileBlock'])
        //     ->name('subscriper.profile.block');
        Route::resource('subscriptions',SubscriptionController::class);
        //**************************************************************************************/
        //**************************************************************************************/
        // reports
        Route::get('reports/index',[ReportController::class,'index'])
                    ->name('reports.index');
        Route::get('reports/subscribe',[ReportController::class,'subscribeView'])
                    ->name('reports.subscribe.view');
        Route::get('reports/best/places/search',[ReportController::class,'bestPlacesSearch'])
                    ->name('reports.best.places.view');

        Route::get('reports/interaction',[ReportController::class,'interaction'])
                    ->name('reports.interaction.view');

        //**************************************************************************************/
        // setting
        //admin
        Route::resource('admins',AdminController::class);
        //notification
        Route::resource('notifications',NotificationController::class);
        //notification
        Route::resource('blocks',BlockController::class);
        //**************************************************************************************/
        //favorites
        Route::get('saveds/places',[SavedController::class,'placesView'])
                    ->name('saveds.places.view');
        Route::get('saveds/comments',[SavedController::class,'commentsView'])
                    ->name('saveds.comments.view');
        Route::resource('saveds',SavedController::class);
        //**************************************************************************************/
        //Category
        Route::resource('categories',CategoryController::class);
        //**************************************************************************************/

        //logout
        Route::post('logout',[AuthController::class,'logout'])->name('logout');
    });

});


























//**************************************************************************************/

// Route::get('/', function () {
//     return view('Dashboard.home.index');
// })->name('dashboard.index');




// ======================== city
// Route::get('/city', function () {
//     return view('Dashboard.city.index');
// });

// Route::get('/city/cityparts', function () {
//     return view('Dashboard.city.cityparts');
// });




// =========================== Comments

// =========================== subscriptions
// Route::get('/subscriptions', function () {
//     return view('Dashboard.subscriptions.index');
// });
Route::get('/subscriptions/allusers', function () {
    return view('Dashboard.subscriptions.allusers');
});
// Route::get('/subscriptions/profile', function () {
//     return view('Dashboard.subscriptions.userprofile');
// });subscriperProfile

// =========================== Messages

// Route::get('/messages/subscribers', function () {
//     return view('Dashboard.messages.subscribers');
// });
// Route::get('/messages/Non-subscribers', function () {
//     return view('Dashboard.messages.Non-subscribers');
// });
// ============================ Reports
// Route::get('/reports', function () {
//     return view('Dashboard.reports.index');
// });
// Route::get('/reports/subscribe', function () {
//     return view('Dashboard.reports.subscribe');
// });
// Route::get('/reports/mostsearch', function () {
//     return view('Dashboard.reports.mostsearch');
// });
// Route::get('/reports/Interaction', function () {
//     return view('Dashboard.reports.Interaction');
// });
// ============================ settings
// Route::get('/settings', function () {
//     return view('Dashboard.settings.index');
// });
// Route::get('/settings/notification', function () {
//     return view('Dashboard.settings.notification');
// });
Route::get('/settings/adding', function () {
    return view('Dashboard.settings.adding');
});
// Route::get('/settings/block', function () {
//     return view('Dashboard.settings.block');
// });
Route::get('/settings/addadmin', function () {
    return view('Dashboard.settings.addadmin');
});
// Route::get('/settings/addcity', function () {
//     return view('Dashboard.settings.addcity');
// });
Route::get('/settings/addplace', function () {
    return view('Dashboard.settings.addplace');
});

// ======================== profile

// Route::get('/profile', function () {
//     return view('Dashboard.profile.index');
// });
Route::get('/profile/update', function () {
    return view('Dashboard.profile.update');
});

// ======================== Saved
// Route::get('/saved', function () {
//     return view('Dashboard.saved.index');
// });
// Route::get('/saved/places', function () {
//     return view('Dashboard.saved.places');
// });
// Route::get('/saved/comments', function () {
//     return view('Dashboard.saved.comments');
// });
