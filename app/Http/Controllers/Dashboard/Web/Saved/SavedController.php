<?php

namespace App\Http\Controllers\Dashboard\Web\Saved;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::where('status','admin')->whereNotNull('user_id')->where('admin_id',Auth::guard('admin')->user()->id)->with('user')->latest()->get();
        // return $favorites;
        return view('Dashboard.saved.index',compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

    //get places view
    public function placesView(){
        $favorites = Favorite::where('status','admin')->whereNotNull('place_id')->where('admin_id',Auth::guard('admin')->user()->id)->with('place')->latest()->paginate(20);
        return view('Dashboard.saved.places',compact('favorites'));
    }
    //get comments view
    public function commentsView(){
        $favorites = Favorite::where('status','admin')->whereNotNull('comment_id')->where('admin_id',Auth::guard('admin')->user()->id)->with('comment')->latest()->paginate(20);
        return view('Dashboard.saved.comments',compact('favorites'));
    }
}
