<x-dashboard.layout title="إضافة مسؤل">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/settings.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الإعدادت والتحكم <small>إضافة أدمن</small></h2>
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <ul class="links p-2">
                    <li class="active"><a href="{{ route('admins.index') }}"><i class="fa-solid fa-user-pen fa-lg text-main me-2"></i>الأدمن</a></li>
                    <li><a href="{{route('notifications.index') }}"><i class="fa-solid fa-bell fa-xl text-main me-2"></i>الإشعارات</a></li>
                    <li><a href="{{ url('/settings/adding') }}"><i class="fa-solid fa-plus fa-xl text-main me-2"></i>إضافة</a></li>
                    <li><a href="{{ url('/settings/block') }}"><i class="fa-solid fa-ban fa-xl text-red me-2"></i>الحظر</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <form action="{{route('admins.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="box addadmin shadow rounded-3 p-2">
                        <h6 class="bold">إضافة | تعديل أدمن</h6>
                        @include('Dashboard.settings.admin._form',[
                            'permissions'=>$permissions,
                            'admin'=>$admin,
                            'btn_text'=>'إضافة',
                        ]);
                    </div>

            </form>
            </div>    
        </div>
    </div>
    

    
    
    </x-dashboard.layout>
    