<?php

namespace App\Http\Controllers\Dashboard\Web\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Web\Admin\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::with('permissions')->latest()->get();
        return view('Dashboard.settings.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $admin = new Admin();
        return view('Dashboard.settings.admin.create',compact('permissions','admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->all());
        $admin->givePermissionTo($request->permission);
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $admin->addMedia($image)
                    ->usingName($request->name)
                    ->toMediaCollection('admin');
        }else{
            $admin->addMediaFromUrl('https://i.ibb.co/VwHtHsM/unknown.png')
                ->usingName($request->name)
                ->toMediaCollection('admin');
        }   
        return redirect()->route('admins.index')->with('success','تم إضافة المسؤل بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admins = Admin::where('id','<>',auth('admin')->user()->id)->latest()->get();
        return view('Dashboard.settings.admin.show',compact('admins'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = Permission::all();
        $admin = Admin::with('permissions')->find($id);
        return view('Dashboard.settings.admin.edit',compact('admin','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $admin =  Admin::find($id);
        $admin->update($request->all());
        if($request->permission){
            $admin->syncPermissions($request->permission);
        }

        if($request->hasFile('avatar')){
            $admin->clearMediaCollection('admin');
            $image = $request->file('avatar');
            $admin->addMedia($image)
                    ->usingName($request->username)
                    ->toMediaCollection('admin');
        }   
        return redirect()->route('admins.index')->with('success','تم تعديل بيانات المسؤل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
