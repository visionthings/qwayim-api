<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            
        $permissions_array = ['التقارير','الحظر وفك حظر','إضافة مدن','الإشتراكات','إضافة مسؤول','مشاهدة المدن والواجهات','الرسائل','إضافة واجهات','مشاهدة الإحصائيات الأساسية'];
        $permissions = collect($permissions_array)->map(function($permission){
            return ['name'=>$permission,'guard_name'=>'admin'];
         });   

        Permission::insert($permissions->toArray());
        $role = Role::create(['name' => 'super_admin','guard_name'=>'admin']);
        $role->givePermissionTo($permissions_array);
         
        
        
        $admin = Admin::create([
            'name'=>'Eng-hatan',
            'email'=>'hatan@email.com',
            'password'=>Hash::make('password'),
            'phone'=>'0987655367',
            'job_name'=>'مدير',
            'job_descripation'=>'مسؤل كبير جدا',
        ]);
        $admin->addMediaFromUrl('https://i.ibb.co/jMft1z5/person.png')->toMediaCollection('admin');
        $admin->assignRole($role);
    }
}
