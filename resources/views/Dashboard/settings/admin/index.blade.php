<x-dashboard.layout title="الإعدادات والتحكم">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/settings.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الإعدادت والتحكم <small>الأدمن</small></h2>
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <ul class="links p-2">
                    <li class="active"><a href="{{ route('admins.index') }}"><i class="fa-solid fa-user-pen fa-lg text-main me-2"></i>الأدمن</a></li>
                    <li><a href="{{ route('notifications.index') }}"><i class="fa-solid fa-bell fa-lg text-main me-2"></i>الإشعارات</a></li>
                    <li><a href="{{ url('/settings/adding') }}"><i class="fa-solid fa-plus fa-lg text-main me-2"></i>إضافة</a></li>
                    <li><a href="{{ route('blocks.index') }}"><i class="fa-solid fa-ban fa-lg text-red me-2"></i>الحظر</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="box shadow rounded-3 p-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="bold">صلاحيات الأدوار</h6>
                        <a href="{{ route('admins.create') }}" class="light-btn p-1 small"><i class="fa-solid fa-plus fa-lg text-main me-2"></i>إضافة ادمن</a>
                    </div>
                    <table class="admins w-100">
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>المسؤولين</td>
                                <td>الدور</td>
                                <td>الصلاحيات</td>
                                <td>تعديل</td>
                                <td></td>
                            </tr>
                        </thead>  
                        <tbody>
                            @forelse ($admins as $key=> $admin)
                                <tr>
                                    <td>{{$key+1}}-</td>
                                    <td><img src="{{$admin->getFirstMediaUrl('admin')}}" width="35" class="rounded-circle" alt="اسم الشخص"></td>
                                    <td>
                                        <h6 class="bold text-dark m-0">{{$admin->name}}</h6>
                                        <span class="text-muted small">{{$admin->email}}</span>
                                    </td>
                                    <td>
                                        <h6 class="bold text-dark m-0">{{$admin->job_name}}</h6>
                                        <span class="text-muted small">{{$admin->job_descripation}}</span>
                                    </td>
                                    <td class="pe-1">
                                        <p class="small m-0 bg-light rounded-3">
                                            @forelse ($admin->permissions as $permission)
                                                
                                            <span>{{$permission->name}}</span>
                                            @empty
                                                <span>لا يوجد اي بيانات</span>
                                            @endforelse
                                           
                                        </p>
                                    </td>
                                    <td>
                                        <a href="{{route('admins.edit',$admin->id)}}">
                                            تعديل
                                        </a>
                                    </td>
                                    <td></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                            @endforelse
                            
                       
                        </tbody>  
                    </table>    
                </div>
            </div>    
        </div>
    </div>
    

    
    
    </x-dashboard.layout>
    