<x-dashboard.layout title="الصفحة الشخصية">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/profile.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الصفحة الشخصية</h2>
    @endsection

    <div class="container profile-home">
        <img src="{{asset('assets/images/profile.svg')}}" class="img-fluid back" alt="">
        <div class="info-home d-flex align-items-center justify-content-between">
            <div class="person-info d-flex align-items-center">
                <div class="image-person">
                    {{-- لو ما فيش صورة للمستخدم --}}
                    {{-- <img src="{{asset('assets/images/unknown.png')}}" class="w-100" alt=""> --}}
                    {{-- لو فى صورة --}}
                    <img src="{{asset('assets/images/person.png')}}" class="w-100" alt="">
                </div>
                <div>
                    <h6 class="bold">{{auth('admin')->user()->name}}</h6>
                    <span class="text-muted small">{{auth('admin')->user()->email}}</span>
                </div>
            </div>
            <div class="btns">
                <a href="{{route('admins.edit',auth('admin')->user()->id)}}" class="light-btn small"><i class="fa-solid fa-circle-info"></i>  تعديل البيانات</a>
                <a href="{{route('admins.index')}}" class="light-btn small"><i class="fa-solid fa-people-group"></i>  إعدادت الفريق</a>
            </div>             
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="notification-box bg-gray p-3 rounded-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">    
                        <h6 class="bold">المنصة</h6>
                        <a href="{{route('notifications.index')}}" class="small">باقى الإشعارات</a>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="newContract">
                        <label for="newContract" role="button">إشعار بالتعاقدات الجديدة</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="newThings">
                        <label for="newThings" role="button">إشعار بالتحديثات</label>
                    </div>
                    <h6 class="bold">الحساب</h6>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="adminChanges">
                        <label for="adminChanges" role="button">إرسال إشعار لي عند قيام أحد الأدمن بتغيير الاعدادات</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="notification-box bg-gray p-3 rounded-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">    
                        <h6 class="bold">معلومات الحساب</h6>
                        <a href="{{route('admins.edit',auth('admin')->user()->id)}}" class="small">التعديل</a>
                    </div>
                    <p class="mb-1 small"><strong class="me-1">الإسم:</strong><span class="dark-gray">{{auth('admin')->user()->name}}</span></p>
                    <p class="mb-1 small"><strong class="me-1">الإيميل:</strong><span class="dark-gray">{{auth('admin')->user()->email}}</span></p>
                    <p class="mb-1 small"><strong class="me-1">رقم الهاتف:</strong><span class="dark-gray">{{auth('admin')->user()->phone}}</span></p>
                    <p class="mb-1 small"><strong class="me-1">الوظيفة:</strong><span class="dark-gray">{{auth('admin')->user()->job_name}}</span></p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="notification-box bg-lightgray p-3 rounded-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">    
                        <h6 class="bold">فريق العمل</h6>
                        <a href="{{url('/settings')}}" class="small">التعديل</a>
                    </div>
                    <table class="admins-show w-100">
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>المسؤولين</td>
                                <td>الدور</td>
                                <td>الصلاحيات</td>
                            </tr>
                        </thead>  
                        <tbody>
                            @forelse ($admins as $key => $admin)
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
                                    <td class="p-2">
                                        <p class="small m-0 rounded-3">
                                            @foreach ($admin->permissions as $permission)
                                                <span>{{$permission->name}}</span>
                                            @endforeach

                                            
                                        </p>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">لا يوجد بيانات</td>
                                </tr>
                            @endforelse
                           
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
    </x-dashboard.layout>
    