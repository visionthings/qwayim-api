<x-dashboard.layout title="الإعدادات والتحكم">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/settings.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الإعدادت والتحكم <small>الحظر</small></h2>
    @endsection
    
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-2">
              <ul class="links p-2">
                <li><a href="{{ route('admins.index') }}"><i class="fa-solid fa-user-pen fa-lg text-main me-2"></i>الأدمن</a></li>
                <li><a href="{{ route('notifications.index') }}"><i class="fa-solid fa-bell fa-lg text-main me-2"></i>الإشعارات</a></li>
                <li><a href="{{ url('/settings/adding') }}"><i class="fa-solid fa-plus fa-xl text-main me-2"></i>إضافة</a></li>
                <li class="active"><a href="{{ route('blocks.index') }}"><i class="fa-solid fa-ban fa-xl text-red me-2"></i>الحظر</a></li>
  
            </ul>
          </div>
          <div class="col-md-10">
            <div class="box shadow block rounded-3 p-2">
                <h6 class="bold">قائمة المحظورين</h6> 
                <table class="w-100 blocking">
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>الإسم</td>
                            <td>الدولة</td>
                            <td></td>
                            <td>تاريخ الإشتراك</td>
                            <td>تاريخ الحظر</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blockUsers as $blockUser)
                            
                     
                        <tr>
                            <td>1-</td>
                            <td><img src="{{$blockUser->getFirstMediaUrl('user')}}" width="35" height="35" class="rounded-circle" alt=""></td>
                            <td>
                                <h6 class="m-0 bold small">{{$blockUser->name}}</h6>
                                <span class="small">{{$blockUser->email}}</span>
                            </td>
                            <td><img src="{{asset('assets/images/sa.png')}}" width="30" height="auto" alt="saudi flag"></td>
                            <td><span>{{Country::countryCode($blockUser->country_code)}}</span>،<span>{{$blockUser->city}}</span></td>
                            <td>{{$blockUser->created_at->format('d-m-Y')}}</td>
                            <td>{{$blockUser->updated_at->format('d-m-Y')}}</td>
                            <td>
                                <form action="{{route('blocks.update',$blockUser->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn">فك الحظر</button></td>
                                </form>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center bold rounded-3">لا يوجد بيانات</td>
                            </tr>
                        @endforelse
                  
                    </tbody>
                </table>
            </div>
          </div>    
      </div>
    </div>
    </x-dashboard.layout>
    