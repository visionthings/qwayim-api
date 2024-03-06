<x-dashboard.layout title="العناصر المحفوظة">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/subscriptions.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/saved.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">العناصر المحفوظة <small>المشتركين</small></h2>
    @endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <a href="{{route('saveds.index')}}" class="main-btn p-2 d-block">المشتركين</a>
            </div>
            <div class="col-4">
                <a href="{{route('saveds.places.view')}}" class="light-btn p-2 d-block">الواجهات</a>
            </div>
            <div class="col-4">
                <a href="{{route('saveds.comments.view')}}" class="light-btn p-2 d-block">التعليقات</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
          <div class="card users shadow rounded-3 p-3 mt-3">
              <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                  <h6 class="small bold m-0">المشتركين المفضلين</h6>
                  <div class="d-flex align-items-center">
                      <form action="" class="d-flex me-2">
                          <input type="text" placeholder="البحث" class="form-control me-2">
                          <a href="" class="small main-btn p-1 rounded-1"><i class="fa-solid fa-magnifying-glass"></i></a>
                      </form>
                  </div>
              </div>
              {{-- عرض 20 ثم 20 واقلب pagination--}}
              <table class="users-index w-100">
                  <thead>
                      <tr>
                          <td></td>
                          <td></td>
                          <td>الإسم</td>
                          <td></td>
                          <td>الدولة</td>
                          <td>تاريخ الإنضمام</td>
                          <td>ID</td>
                          <td></td>
                          <td></td>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($favorites as $key=>$favorite)
                        <tr>
                            <td>{{$key+1}}-</td>
                            <td><img src="{{$favorite->user->getFirstMediaUrl('user')}}" width="35" height="35" class="rounded-circle"></td>
                            <td><h6 class="bold m-0 small">{{$favorite->user->name}}</h6><span>{{$favorite->user->email}}</span></td>
                            <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                            <td>{{$favorite->user->city}}، {{Country::countryCode($favorite->user->country_code)}}</td>
                            <td>{{$favorite->user->created_at->format('Y-m-d')}}</td>
                            <td>#{{$favorite->user->id}}</td>
                           
                            <td>
                                <div class="dropdown">
                                    <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                    </span>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{route('subscriper.profile',$favorite->user->id)}}">عرض الملف الشخصي</a></li>
                                    <li><a class="dropdown-item" href="#">حظر</a></li>
                                    <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center bold rounded-3">لا يوجد بيانات</td>
                        </tr>
                    @endforelse
                  </tbody>
              </table>
      </div>  
    </div>
    </x-dashboard.layout>
    