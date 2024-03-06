<x-dashboard.layout title="الرسائل">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/messages.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الرسائل <small>غير المشتركين</small></h2>
    @endsection
    
    <ul class="d-flex justify-content-center mt-2">
        <li><a href="{{ url('/messages') }}" class="light-btn mx-2">الكل</a></li>
        <li><a href="{{ url('/messages/subscribers') }}" class="light-btn mx-2">المشتركين</a></li>
        <li><a href="{{ url('/messages/Non-subscribers') }}" class="main-btn mx-2">غير مشتركين</a></li>
    </ul>
    
    <div class="container">
        <div class="messages">
        
            <div class="message p-3 rounded-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/unknownuser.png')}}" width="50" height="50" class="rounded-circle shadow" alt="">
                        <div class="ms-2">
                            <h6 class="m-0 bold">احمد محمود</h6>
                            <span class="small text-red d-block">غير مشترك</span>
                            <span class="small text-main d-block"><i class="fa-solid fa-phone mx-1"></i><span class="text-dark bold">01021232131</span></span>
                            <span class="small text-red d-block"><i class="fa-solid fa-envelope mx-1"></i><span class="text-dark bold">ahmed@yahoo.com</span></span>
                        </div>    
                    </div>
                    <div>
                        <a href="" class="text-main mx-1"><i class="fa-solid fa-check-double fa-lg"></i></a>
                        <a role="button" onClick="showMessagePop()" class="text-red mx-1"><i class="fa-solid fa-trash-can fa-lg"></i></a>
                    </div>
                </div>
                <div class="w-100 mx-auto shadow px-2 py-3 rounded-2 mt-2 bg-light">
                    <p class="m-0">السلام عليكم ورحمة ورحمة االه تعالى وبركاته .. اريد تسجيل بياناتي معكم لعرضها على موقعكم هذا</p>
                </div>
            </div>
            
            <div class="message p-3 rounded-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/unknownuser.png')}}" width="50" height="50" class="rounded-circle shadow" alt="">
                        <div class="ms-2">
                            <h6 class="m-0 bold">عاصم اسامة</h6>
                            <span class="small text-red d-block">غير مشترك</span>
                            <span class="small text-main d-block"><i class="fa-solid fa-phone mx-1"></i><span class="text-dark bold">01021232131</span></span>
                            <span class="small text-red d-block"><i class="fa-solid fa-envelope mx-1"></i><span class="text-dark bold">assem@yahoo.com</span></span>
                        </div>    
                    </div>
                    <div>
                        <a href="" class="text-main mx-1"><i class="fa-solid fa-check-double fa-lg"></i></a>
                        <a role="button" onClick="showMessagePop()" class="text-red mx-1"><i class="fa-solid fa-trash-can fa-lg"></i></a>
                    </div>
                </div>
                <div class="w-100 mx-auto shadow px-2 py-3 rounded-2 mt-2 bg-light">
                    <p class="m-0">السلام عليكم ورحمة ورحمة االه تعالى وبركاته .. اريد تسجيل بياناتي معكم لعرضها على موقعكم هذا</p>
                </div>
            </div>
            
        </div>    
    </div>
    </x-dashboard.layout>
    