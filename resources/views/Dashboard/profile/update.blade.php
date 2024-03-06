<x-dashboard.layout title="تعديل البيانات">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/profile.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الصفحة الشخصية <small>- تعديل البيانات الشخصية</small></h2>
    @endsection

    <div class="container">
        <div class="row g-3">
            <div class="col-md-7">
                <div class="box rounded-3 shadow p-3">
                    <h6 class="small bold m-0">تغيير المعلومات الأساسية للحساب</h6>
                    <form action="" class="edit-info">
                        <div class="img-contain">
                            <img src="{{asset('assets/images/unknown.png')}}"  alt="">
                        </div>
                        <div class="mb-2">
                            <label for="image">الصورة الشخصية</label>
                            <input type="file" id="image" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-2">
                            <label for="name">الإسم</label>
                            <input type="text" id="name" class="form-control" placeholder="الإسم">
                        </div>
                        <div class="mb-2">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" id="email" class="form-control" placeholder="admin@qwaem.com">
                        </div>
                        <div class="mb-2">
                            <label for="phone">رقم الهاتف</label>
                            <input type="tel" id="phone" class="form-control" placeholder="الرقم برمز الدولة">
                        </div>
                        <div class="mb-2">
                            <label for="workName">المسمي الوظيفي</label>
                            <input type="text" id="workName" class="form-control" placeholder="محرر،ناشر،...">
                        </div>
                        <a href="" type="submit" class="main-btn small p-2"><i class="fa-solid fa-floppy-disk"></i>  حفظ التعديلات</a>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="box rounded-3 shadow p-3">
                    <h6 class="small bold m-0">تغيير كلمة السر</h6>
                    <form action="" class="edit-password">
                        <div class="mb-2">
                            <label for="password">كلمة السر الحالية</label>
                            <input type="password" id="password" class="form-control" placeholder="ادخل كلمة السر الحالية">
                        </div>
                        <div class="mb-2">
                            <label for="newPassword">كلمة السر الجديدة</label>
                            <input type="password" id="newPassword" class="form-control" placeholder="أدخل كلمة سر قوية">
                        </div>
                        <div class="mb-2">
                            <label for="renewPassword">اعادة كلمة السر الجديدة</label>
                            <input type="passworf" id="renewPassword" class="form-control" placeholder="اعد كتابة كلمة السر">
                        </div>
                        <a href="" type="submit" class="main-btn small p-2"><i class="fa-solid fa-lock"></i>  تغيير كلمة السر</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    </x-dashboard.layout>
    