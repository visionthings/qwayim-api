<?php

namespace App\Http\Controllers\Dashboard\Web\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $userMessages = User::filter($request->all())->whereHas('messages')->with('messages')->latest()->get();
        $userMessages = Message::filter($request->all())->get();
        return view('Dashboard.messages.index',compact('userMessages'));
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
        $message = Message::find($id);
        $message->update([
            'status'=>'read',
        ]);
        return redirect()->route('messages.index')->with('success','تم تحديث حالة الرساله بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect()->route('messages.index')->with('success','تم حذف الرسالة بنجاح');
    }
}
