<?php

namespace App\Http\Controllers\Dashboard\Web\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Catfilter;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('Dashboard.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $store = Category::create($request->all());

        /*     $datesArray = json_decode($request->post('categories'));

        foreach($datesArray as $catFilter){

            Catfilter::create([
                'category_id'=>$store->id,
                'name'=>$catFilter->value,
            ]);
        } */
        return redirect()->route('categories.index')->with('success','تم إ ضافة القسم بنجاح');


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
        $delete = Category::find($id);
        $delete->delete();
        return redirect()->route('categories.index')->with('success','تم حذف القسم بنجاح');
    }
}
