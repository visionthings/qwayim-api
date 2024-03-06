<x-dashboard.layout title="الإعدادات والتحكم">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/settings.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الإعدادت والتحكم <small>الإضافة</small></h2>
    @endsection
    
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-2">
              <ul class="links p-2">
                <li><a href="{{ route('admins.index') }}"><i class="fa-solid fa-user-pen fa-lg text-main me-2"></i>الأدمن</a></li>
                <li><a href="{{ route('notifications.index') }}"><i class="fa-solid fa-bell fa-lg text-main me-2"></i>الإشعارات</a></li>
                <li class="active"><a href="{{ url('/settings/adding') }}"><i class="fa-solid fa-plus fa-xl text-main me-2"></i>إضافة</a></li>
                  <li><a href="{{ route('blocks.index') }}"><i class="fa-solid fa-ban fa-xl text-red me-2"></i>الحظر</a></li>
              </ul>
          </div>
          <div class="col-md-10">
              <div class="box shadow adding rounded-3 p-2">
                <h6 class="bold mb-3">اختر ما تود إضافته</h6>
                  <div class="container">
                    <div class="row">
                            <a href="{{ route('cities.create') }}" class="col-12 px-3 py-3 rounded-4 shadow mb-4 add-part">
                                <h3>إضافة مدينة جديدة</h3>
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                            <a href="{{route('admins.create')}}" class="col-12 px-3 py-3 rounded-4 shadow mb-4 add-part">
                                <h3>إضافة مسؤل</h3>
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                    </div>
                  </div>
              </div>
          </div>    
      </div>
    </div>
    
    </x-dashboard.layout>
    