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
    <link rel="stylesheet" href="{{asset('assets/css/dashboard/login.css')}}">
    <title>تسجيل الدخول</title>
</head>
<body>


    <form action="{{route('dashboard.login')}}" method="POST">
        @csrf
        <img src="{{asset('assets/images/logo.png')}}" class="m-auto mb-2 d-block" alt="">

        @if ( Session::has('failed'))
            <div class="alert alert-danger">
                <p>{{ Session::get('failed') }}</p>
            </div>
        @endif
        @error('email')
            <p>{{$message}}</p>
        @enderror
        <label for="email">البريد الإلكتروني</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="الإيميل">
        @error('password')
            <p>{{$message}}</p>
        @enderror
        <label for="password">كلمة السر</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="كلمة السر">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="rememberme">
            <label class="form-check-label bold" for="rememberme">
               تذكرني
            </label>
        </div>
        <button type="submit" class="light-btn p-1 small"><i class="fa-solid fa-lock-open"></i>  تسجيل الدخول</button>
    </form>
    

    
    <script src="{{asset('assets/js/jquary3.7.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>