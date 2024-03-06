<?php

namespace App\Http\Controllers\Dashboard\Web\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blockUsers = User::where('status','block')->paginate(10);
        return view('Dashboard.settings.block',compact('blockUsers'));
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
        $updateUserStatus = User::find($id);
        $updateUserStatus->update([
            'status'=>'active',
        ]);

        return redirect()->route('blocks.index')->with('success','تم فك حظر المشترك بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
