<x-dashboard.layout title="الرسائل">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/messages.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الرسائل <small>المشتركين</small></h2>
    @endsection
    
    <ul class="d-flex justify-content-center mt-2">
        <li><a href="{{ url('/messages') }}" class="light-btn mx-2">الكل</a></li>
        <li><a href="{{ url('/messages/subscribers') }}" class="main-btn mx-2">المشتركين</a></li>
        <li><a href="{{ url('/messages/Non-subscribers') }}" class="light-btn mx-2">غير مشتركين</a></li>
    </ul>
    
    <div class="container">
        <div class="messages">
            <div class="message p-3 rounded-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/person.png')}}" width="50" height="50" class="rounded-circle shadow" alt="">
                        <div class="ms-2">
                            <h6 class="m-0 bold">م هتان عاشور</h6>
                            <span class="small text-main">متصل الان</span>
                            {{-- <span class="small text-red">غير متصل الان</span> --}}
                        </div>    
                    </div>
                    <div>
                        <a href="" class="text-main mx-1"><i class="fa-solid fa-check-double fa-lg"></i></a>
                        <a role="button" onClick="showMessagePop()" class="text-red mx-1"><i class="fa-solid fa-trash-can fa-lg"></i></a>
                        <a href="" class="text-main mx-1"><i class="fa-solid fa-eye fa-lg"></i></a>
                    </div>
                </div>
                <div class="w-100 mx-auto shadow px-2 py-3 rounded-2 mt-2 bg-light">
                    <p class="m-0">السلام عليكم ورحمة ورحمة االله تعالى وبركاته .. اريد تسجيل بياناتي معكم لعرضها على موقعكم هذا</p>
                </div>
            </div>
            
            
            <div class="message p-3 rounded-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/person.png')}}" width="50" height="50" class="rounded-circle shadow" alt="">
                        <div class="ms-2">
                            <h6 class="m-0 bold">م أحمد اسماعيل</h6>
                            {{-- <span class="small text-main">متصل الان</span> --}}
                            <span class="small text-red">غير متصل الان</span>
                        </div>    
                    </div>
                    <div>
                        <a href="" class="text-main mx-1"><i class="fa-solid fa-check-double fa-lg"></i></a>
                        <a role="button" onClick="showMessagePop()" class="text-red mx-1"><i class="fa-solid fa-trash-can fa-lg"></i></a>
                        <a href="" class="text-main mx-1"><i class="fa-solid fa-eye fa-lg"></i></a>
                    </div>
                </div>
                <div class="w-100 mx-auto shadow px-2 py-3 rounded-2 mt-2 bg-light">
                    <p class="m-0">السلام عليكم ورحمة ورحمة االله تعالى وبركاته .. اريد تسجيل بياناتي معكم لعرضها على موقعكم هذا</p>
                </div>
            </div>
            
            <div class="message p-3 rounded-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/person.png')}}" width="50" height="50" class="rounded-circle shadow" alt="">
                        <div class="ms-2">
                            <h6 class="m-0 bold">م محمد محمود</h6>
                            <span class="small text-main">متصل الان</span>
                            {{-- <span class="small text-red">غير متصل الان</span> --}}
                        </div>    
                    </div>
                    <div>
                        <a href="" class="text-main mx-1"><i class="fa-solid fa-check-double fa-lg"></i></a>
                        <a role="button" onClick="showMessagePop()" class="text-red mx-1"><i class="fa-solid fa-trash-can fa-lg"></i></a>
                        <a href="" class="text-main mx-1"><i class="fa-solid fa-eye fa-lg"></i></a>
                    </div>
                </div>
                <div class="w-100 mx-auto shadow px-2 py-3 rounded-2 mt-2 bg-light">
                    <p class="m-0">السلام عليكم ورحمة ورحمة االه تعالى وبركاته .. اريد تسجيل بياناتي معكم لعرضها على موقعكم هذا</p>
                </div>
            </div>
            
        </div>    
    </div>
    </x-dashboard.layout>
    