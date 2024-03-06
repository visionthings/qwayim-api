<?php

namespace App\Http\Controllers\Dashboard\Web\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.settings.notification');
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
            $setting_change_not=$request->input('setting_change_not','0');
            $subscriper_message_not=$request->input('subscriper_message_not','0');
            $subscriper_comment_not=$request->input('subscriper_comment_not','0');
            $subscriper_rate_not=$request->input('subscriper_rate_not','0');
            $subscriper_question_not=$request->input('subscriper_question_not','0');
        

            $admin = Admin::find($id);
            $admin->update([
                'setting_change_not'=>$setting_change_not,
                'subscriper_message_not'=>$subscriper_message_not,
                'subscriper_comment_not'=>$subscriper_comment_not,
                'subscriper_rate_not'=>$subscriper_rate_not,
                'subscriper_question_not'=>$subscriper_question_not,
            ]);
  
            return redirect()->route('notifications.index')->with('success','تم تعديل اعدادات الاشعارات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
