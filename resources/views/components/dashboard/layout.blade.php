<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard/layout/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard/layout/bootstrap.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard/layout/bootstrap-icons/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard/layout/layout.css')}}">
    @stack('style')

    <title>{{$title}}</title>
</head>
<body>
    <style>
        .btn-li{
            width: 100% !important;
            text-align: right;
            background-color: transparent;
            border: none;
            padding: 0 17px !important;
        }
    </style>


    {{-- start side menu --}}
    <div class="side-menu">
        <a href="{{ url('/') }}">
            <img src="{{asset('assets/images/logo.png')}}" alt="qwaem Logo">
        </a>
        <ul>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{route('home') }}"><i class="fa-solid fa-house"></i>الرئيسية</a></li>
            <li class="{{ Route::is('cities*') ? 'active' : '' }}"><a href="{{ route('cities.index') }}"><i class="fa-regular fa-font-awesome"></i>المدن</a></li>
            <li class="{{ Route::is('categories*') ? 'active' : '' }}"><a href="{{ route('categories.index') }}"><i class="fa-solid fa-list"></i>الاقسام</a></li>

            <li class="{{ Route::is('comments*') ? 'active' : '' }}"><a href="{{ route('comments.index') }}"><i class="fa-regular fa-comment-dots"></i>التعليقات</a></li>
            <li class="{{ Route::is('subscriptions*') ? 'active' : '' }}"><a href="{{route('subscriptions.index')}}"><i class="fa-solid fa-users"></i>الاشتراكات</a></li>
            <li class="{{ Route::is('messages*') ? 'active' : '' }}"><a href="{{ route('messages.index') }}"><span class="position-relative"><i class="fa-solid fa-comments"></i><span class="position-absolute top-0 start-0 translate-middle badge rounded-circle bg-red">{{$messagesCount}}</span></span>الرسائل</a></li>
            <li class="{{ Route::is('reports*') ? 'active' : '' }}"><a href="{{ route('reports.index') }}"><i class="fa-regular fa-clipboard"></i>التقارير</a></li>
            <li class="{{ Route::is('admins*')||Route::is('notifications*')|| Request::is('settings/adding*') ||Route::is('blocks*') ? 'active' : '' }}"><a href="{{ route('admins.index') }}" class="setting-font"><i class="fa-solid fa-gear"></i>الإعدادات والتحكم</a></li>

        </ul>
    </div>


    {{-- start navbar --}}
    <div class="nav">
        <div class="nav-inner ms-auto d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-bars text-main sidebar-toggle fa-lg me-2" role="button" onclick="toggleSidebar()"></i>
                @yield('navContent')
            </div>
            <div class="d-flex align-items-center">
                <a href="{{route('saveds.index')}}">
                    <i class="fa-solid fa-bookmark text-main me-1 me-md-2 fa-lg"></i>
                </a>
                <span class="position-relative d-none">
                    <i class="fa-regular fa-bell text-main notification-toggle fa-lg" role="button" onclick="toggleNotification()"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-red">9</span>
                </span>
                <div class="dropdown">
                    <button class="btn text-black dropdown-toggle btn-lg" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('assets/images/person.png')}}" width="40" height="40" class="me-0 me-md-2 rounded-circle" alt="">
                        <strong class="d-none d-md-inline-block">{{auth('admin')->user()->name}}</strong>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('admins.show',auth('admin')->user()->id) }}"><i class="fa-regular fa-user text-main me-1"></i>الصفحة الشخصية</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="w-100 btn-li px-3">
                                    <i class="fa-solid fa-arrow-right-to-bracket text-main me-1"></i>تسجيل خروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div> 
            </div>
        </div>
    </div>

    {{-- start notification side --}}
    {{-- <div class="notification">
        <div class="mb-4">
            <h3>الأشعارات</h3>
            <a href="" class="bug w-100 rounded-3 bg-lightgray p-2 d-flex align-items-center mb-2">
                <i class="fa-solid fa-bug fa-lg me-2"></i>
                <div> 
                    <p class="small">لديك مشكلة تحتاج الى كذا كذا كذا</p>
                    <span class="small text-secondary">الآن</span>
                </div>
            </a>
            
            <a href="" class="userNoti w-100 rounded-3 bg-gray p-2 d-flex align-items-center mb-2">
                <i class="fa-solid fa-user fa-lg me-2"></i>
                <div> 
                    <p class="small">لديك تسجيل دخول جديد الان</p>
                    <span class="small text-secondary">الآن</span>
                </div>
            </a>

            <a href="" class="bug w-100 rounded-3 bg-lightgray p-2 d-flex align-items-center mb-2">
                <i class="fa-solid fa-bug fa-lg me-2"></i>
                <div> 
                    <p class="small">لديك مشكلة تحتاج الى كذا كذا كذا</p>
                    <span class="small text-secondary">الآن</span>
                </div>
            </a>

            <a href="" class="under-line fw-bold">مشاهدة الكل</a>
        </div>
        <div>
            <h3>النشاطات</h3>
            <a href="" class="rate w-100 rounded-3 bg-lightgray p-2 d-flex align-items-center mb-2">
                <i class="fa-regular fa-star fa-lg me-2"></i>
                <div> 
                    <p class="small">تقييم جديد لفندق مكة هوتل</p>
                    <span class="small text-secondary">منذ 41 دقيقة</span>
                </div>
            </a>
            
            <a href="" class="comm w-100 rounded-3 bg-gray p-2 d-flex align-items-center mb-2">
                <i class="fa-regular fa-comment-dots fa-lg me-2"></i>
                <div> 
                    <p class="small">لديك تعليق جديد على مطعم ابن الشام</p>
                    <span class="small text-secondary">منذ 59 دقيقة</span>
                </div>
            </a>
            
            <a href="" class="rate w-100 rounded-3 bg-lightgray p-2 d-flex align-items-center mb-2">
                <i class="fa-regular fa-star fa-lg me-2"></i>
                <div> 
                    <p class="small">تقييم جديد لفندق مكة هوتل</p>
                    <span class="small text-secondary">منذ 41 دقيقة</span>
                </div>
            </a>
            
            <a href="" class="comm w-100 rounded-3 bg-gray p-2 d-flex align-items-center mb-2">
                <i class="fa-regular fa-comment-dots fa-lg me-2"></i>
                <div> 
                    <p class="small">لديك تعليق جديد على مطعم ابن الشام</p>
                    <span class="small text-secondary">منذ 59 دقيقة</span>
                </div>
            </a>

            <a href="" class="under-line fw-bold">مشاهدة الكل</a>
        </div>
    </div> --}}


    {{-- start main content --}}
    <div class="main">
        <div class="content">
            {{-- start changed content --}}   
            @if(Session::has('success'))
                    {{-- <p class="alert alert-success"></p> --}}
                    <div class="alert alert-success">
                        <strong>{{Session::get('success')}}</strong>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    </div> 
                @endif
            {{$slot}}
        </div>
    </div>
    
    <div class="delete-popup" id="delete-hintpop">
        <div class="delete-hint rounded-3">
        <h6 class="bold small">هل تريد بالتأكيد حذف هذا الإقتراح؟</h6>
        <p>بمجرد حذف هذا الإقتراح لا يمكن استعادته مرة اخري </p>
        <div class="d-flex justify-content-around">
            <button class="light-btn p-1" onclick="hidePop()">تراجع</button>
            <button class="red-btn p-1">حذف</button>
        </div>
        </div>
    </div>
    <div class="delete-popup" id="delete-userpop">
        <div class="delete-user rounded-3">
        <h6 class="bold small">هل تريد بالتأكيد حذف هذا العضو؟</h6>
        <p>بمجرد حذف هذا العضو لا يمكن استعادته مرة اخري </p>
        <div class="d-flex justify-content-around">
            <button class="light-btn p-1" onclick="hidePop()">تراجع</button>
            <button class="red-btn p-1">حذف</button>
        </div>
        </div>
    </div>
    <div class="delete-popup" id="delete-placepop">
        <div class="delete-user rounded-3">
        <h6 class="bold small">هل تريد بالتأكيد حذف هذا المكان؟</h6>
        <p>بمجرد حذف هذا المكان لا يمكن استعادته مرة اخري </p>
        <div class="d-flex justify-content-around">
            <button class="light-btn p-1" onclick="hidePop()">تراجع</button>
            <button class="red-btn p-1">حذف</button>
        </div>
        </div>
    </div>
    <div class="delete-popup" id="delete-adminpop">
        <div class="delete-user rounded-3">
        <h6 class="bold small">هل تريد بالتأكيد حذف هذا المسؤول؟</h6>
        <p>بمجرد حذف هذا المسؤول لا يمكن استعادته مرة اخري </p>
        <div class="d-flex justify-content-around">
            <button class="light-btn p-1" onclick="hidePop()">تراجع</button>
            <button class="red-btn p-1">حذف</button>
        </div>
        </div>
    </div>
    <div class="delete-popup" id="delete-messagepop">
        <div class="delete-user rounded-3">
        <h6 class="bold small">هل تريد بالتأكيد حذف هذه الرسالة؟</h6>
        <p>بمجرد حذف هذه الرسالة لا يمكن استعادتها مرة اخري </p>
        <div class="d-flex justify-content-around">
            <button class="light-btn p-1" onclick="hidePop()">تراجع</button>
            <button class="red-btn p-1">حذف</button>
        </div>
        </div>
    </div>
    <div class="loader-container">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    {{-- adding body overflowy hidden --}}
    <script src="{{asset('assets/js/jquary3.7.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    @stack('script')
</body>
</html>
