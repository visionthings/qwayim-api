<?php

namespace App\Http\Controllers\Dashboard\Web\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Place;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // $comments = Comment::filter($request->all())->with(['place'=>fn($q)=>$q->filter($request->all())])->latest()->get();
        $palcesComments = Place::commentfilter($request->all())->with('comments.user')->latest()->get();
        // return $comments;
        // $comments = Place::filter($request->all())->with('category')->with('comments')->latest()->get();

        // dd($comments);
        
        $cities = City::latest()->get();
        $categories = Category::latest()->get();
        $places = Place::latest()->get();
        return view('Dashboard.comments.index',compact('palcesComments','cities','categories','places'));

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
        // $delete = Comment::find($id);
        // $delete->delete();
        return redirect()->route('comments.index')->with('success','تم حذف التعليق بنجاح');
    }
}
