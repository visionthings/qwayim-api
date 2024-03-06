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
                    <h6 class="bold">هتان عاشور</h6>
                    <span class="text-muted small">hattanashour@gmail.com</span>
                </div>
            </div>
            <div class="btns">
                <a href="{{url('/profile/update')}}" class="light-btn small"><i class="fa-solid fa-circle-info"></i>  تعديل البيانات</a>
                <a href="{{url('/settings')}}" class="light-btn small"><i class="fa-solid fa-people-group"></i>  إعدادت الفريق</a>
            </div>             
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="notification-box bg-gray p-3 rounded-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">    
                        <h6 class="bold">المنصة</h6>
                        <a href="{{url('/settings/notification')}}" class="small">باقى الإشعارات</a>
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
                        <a href="{{url('/profile/update')}}" class="small">التعديل</a>
                    </div>
                    <p class="mb-1 small"><strong class="me-1">الإسم:</strong><span class="dark-gray">هتان عاشور</span></p>
                    <p class="mb-1 small"><strong class="me-1">الإيميل:</strong><span class="dark-gray">hattanashour@gmail.com</span></p>
                    <p class="mb-1 small"><strong class="me-1">رقم الهاتف:</strong><span class="dark-gray">0096605373289</span></p>
                    <p class="mb-1 small"><strong class="me-1">الدولة:</strong><span class="dark-gray">المملكة العربية السعودية</span></p>
                    <p class="mb-1 small"><strong class="me-1">الوظيفة:</strong><span class="dark-gray">مدير</span></p>
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
                            <tr>
                                <td>1-</td>
                                <td><img src="{{asset('assets/images/person.png')}}" width="35" class="rounded-circle" alt="اسم الشخص"></td>
                                <td>
                                    <h6 class="bold text-dark m-0">هتان عاشور</h6>
                                    <span class="text-muted small">hattanashour@gmail.com</span>
                                </td>
                                <td>
                                    <h6 class="bold text-dark m-0">مدير</h6>
                                    <span class="text-muted small">المنظمة</span>
                                </td>
                                <td class="p-2">
                                    <p class="small m-0 rounded-3">
                                        <span>الرسائل</span>
                                        <span>الإحصاءات</span>
                                        <span>النشاطات</span>
                                        <span>الإشتراكات</span>
                                        <span>الإعدادت</span>
                                        <span>الحظر</span>
                                        <span>الإضافة</span>
                                    </p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>2-</td>
                                <td><img src="{{asset('assets/images/person.png')}}" width="35" class="rounded-circle" alt="اسم الشخص"></td>
                                <td>
                                    <h6 class="bold text-dark m-0">عاصم اسامة</h6>
                                    <span class="text-muted small">assemosama@gmail.com</span>
                                </td>
                                <td>
                                    <h6 class="bold text-dark m-0">محرر</h6>
                                    <span class="text-muted small">محلل</span>
                                </td>
                                <td class="p-2">
                                    <p class="small m-0 rounded-3">
                                        <span>الرسائل</span>
                                        <span>الإحصاءات</span>
                                        <span>النشاطات</span>
                                        <span>الإشتراكات</span>
                                    </p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>3-</td>
                                <td><img src="{{asset('assets/images/person.png')}}" width="35" class="rounded-circle" alt="اسم الشخص"></td>
                                <td>
                                    <h6 class="bold text-dark m-0">احمد إسماعيل</h6>
                                    <span class="text-muted small">ahmedismael@gmail.com</span>
                                </td>
                                <td>
                                    <h6 class="bold text-dark m-0">مشرف</h6>
                                    <span class="text-muted small">مرسل</span>
                                </td>
                                <td class="p-2">
                                    <p class="small m-0 rounded-3">
                                        <span>الرسائل</span>
                                        <span>الإشتراكات</span>
                                    </p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>4-</td>
                                <td><img src="{{asset('assets/images/person.png')}}" width="35" class="rounded-circle" alt="اسم الشخص"></td>
                                <td>
                                    <h6 class="bold text-dark m-0">مصطفي احمد</h6>
                                    <span class="text-muted small">mostafa@gmail.com</span>
                                </td>
                                <td>
                                    <h6 class="bold text-dark m-0">محرر</h6>
                                    <span class="text-muted small">محلل</span>
                                </td>
                                <td class="p-2">
                                    <p class="small m-0 rounded-3">
                                        <span>الرسائل</span>
                                        <span>الإحصاءات</span>
                                        <span>النشاطات</span>
                                        <span>الإشتراكات</span>
                                    </p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>5-</td>
                                <td><img src="{{asset('assets/images/person.png')}}" width="35" class="rounded-circle" alt="اسم الشخص"></td>
                                <td>
                                    <h6 class="bold text-dark m-0">على محمد</h6>
                                    <span class="text-muted small">alimohamed@gmail.com</span>
                                </td>
                                <td>
                                    <h6 class="bold text-dark m-0">مشرف</h6>
                                    <span class="text-muted small">مرسل</span>
                                </td>
                                <td class="p-2">
                                    <p class="small m-0 rounded-3">
                                        <span>الرسائل</span>
                                        <span>الإشتراكات</span>
                                    </p>
                                </td>
                            </tr>
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
    </x-dashboard.layout>
    