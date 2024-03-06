<?php

namespace App\Http\Controllers\Dashboard\Web\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Web\City\CityRequest;
use App\Http\Requests\Dashboard\Web\News\NewsRequest;
use App\Http\Requests\Dashboard\Web\Place\PlaceRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\News;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Intl\Countries;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::with(['places'=>fn($q)=>$q->orderBy('view','DESC')])->latest()->paginate(10);
        $countries = Countries::getCountryCodes();

        return view('Dashboard.city.index',compact('cities','countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city = new City();
        $countries = Countries::getCountryCodes();
        return view('Dashboard.city.create',compact('city','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {

        $store = City::create($request->all());

        if($request->hasFile('city_images')){
             foreach($request->file('city_images') as $key => $image){
                $store->addMedia($image)
                        ->usingName($store->name.$key)
                        ->toMediaCollection('city');
            }
        }

        if($request->hasFile('flag_image')){
            $image = $request->file('flag_image');
                $store->addMedia($image)
                        ->usingName($store->name)
                        ->toMediaCollection('flag');
        }
        return redirect()->route('cities.index')->with('success','تم إضافة المدينة بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::find($id);
        $categories = Category::latest()->get();
        return view('Dashboard.city.show',compact('city','categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::find($id);
        $countries = Countries::getCountryCodes();
        return view('Dashboard.city.edit',compact('city','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, string $id)
    {

        $update = City::find($id);
        $update->update($request->all());

        if($request->hasFile('city_images')){
            $update->clearMediaCollection('city');

            $images = $request->file('city_images');
            foreach($images as $image){
                $update->addMedia($image)
                        ->usingName($update->name)
                        ->toMediaCollection('city');
            }
        }

        if($request->hasFile('flag_image')){
            $update->clearMediaCollection('flag');
            $image = $request->file('flag_image');
                $update->addMedia($image)
                        ->usingName($update->name)
                        ->toMediaCollection('flag');
        }
        return redirect()->route('cities.index')->with('success','تم تعديل المدينة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // get create place for city view
    public function CityCreatePlaceView($id){
        $city = City::find($id);
        $categories = Category::latest()->get();
        $place = new Place();
        return view('Dashboard.city.place.create',compact('city','categories','place'));
    }

    // store place for city
    public function storePlace(PlaceRequest $request){
        // $request->validate(['name'=>['required']]);

        $store = Place::create($request->all());
        $store->feature()->create($request->all());
        $store->contact()->create($request->all());

        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $image){
               $store->addMedia($image)
                      ->toMediaCollection('place');
            }
        }

        return redirect()->back()->with('success','تم إضافة المكان بنجاح');
        // return $request->all();

    }
    // get place edit view
    public function editPlaceView($id){
        $place = Place::find($id);
        $city = $place->city;
        $categories = Category::latest()->get();
        return view('Dashboard.city.place.edit',compact('place','city','categories'));
    }
    // store place for city
    public function updatePlace(Request $request, $id){
        // $request->validate(['name'=>['required']]);
        $update = Place::find($id);
        $update->update($request->all());
        $update->feature()->delete();
        $update->contact()->delete();

        // $store = Place::create($request->all());
        // $update->feature()->create($request->all());
        // $update->contact()->create($request->all());

        if($request->hasFile('images')){
            $update->clearMediaCollection('images');

            $images = $request->file('images');
            foreach($images as $image){
               $update->addMedia($image)
                      ->toMediaCollection('place');
            }
        }
        // return $request->all();
        return redirect()->back()->with('success','تم تعديل المكان بنجاح');

    }
//    News
    public function CityCreateNewsView($id){
        $city = City::find($id);
        $news = new News();
        return view('Dashboard.city.news.create',compact('city','news'));
    }

    // store news for city
    public function storeNews(NewsRequest $request){

        $store = News::create($request->all());


        if($request->hasFile('news_images')){

            $images = $request->file('news_images');
            foreach($images as $image){
               $store->addMedia($image)
                      ->usingName($request->title)
                      ->toMediaCollection('news');
            }
        }
        return redirect()->back()->with('success','تم إضافة الخبر بنجاح');

    }
    // get place edit view
    public function editNewsView($id){
        $news = News::find($id);
        $city = $news->city;
        return view('Dashboard.city.news.edit',compact('news','city'));
    }
    // store place for city
    public function updateNews(NewsRequest $request, $id){
        $update = News::find($id);
        $update->update($request->all());

        if($request->hasFile('news_images')){
            $update->clearMediaCollection('news');
            $images = $request->file('news_images');
            foreach($images as $image){
               $update->addMedia($image)
                      ->toMediaCollection('news');
            }
        }
        // return $request->all();
        return redirect()->back()->with('success','تم تعديل الخبر بنجاح');

    }
    // city cat show
    public function cityCatShowView(Request $request,$cat_id,$city_id){
        $category = Category::find($cat_id);
        // $getCityPlacesByCategoryId = City::filter($request->all())->with(['places'=>fn($q)=>$q->filter($request->all(),$cat_id)->withCount('comments')])->first();

        // $getCityPlacesByCategoryId = City::with(['places'=>fn($q)=>$q->filter($request->all())->where('category_id',$cat_id)->withCount('comments')])->find($city_id);
        $getCityPlacesByCategoryId = Place::filter($request->all(),$city_id)->where('category_id',$cat_id)->withCount('comments')->get();
        $categories = Category::latest()->get();
        $cities = City::latest()->get();
        return view('Dashboard.city.cat_show',compact('getCityPlacesByCategoryId','categories','category','cities'));
    }


}
