<x-dashboard.layout title="{{$city->name}}">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/settings.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الإعدادت والتحكم <small>إضافة مدينة</small></h2>
    @endsection
    
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-2">
              <ul class="links p-2">
                  <li><a href="{{ url('/settings') }}"><i class="fa-solid fa-user-pen fa-xl text-main me-2"></i>الأدمن</a></li>
                  <li><a href="{{ url('/settings/notification') }}"><i class="fa-solid fa-bell fa-xl text-main me-2"></i>الإشعارات</a></li>
                  <li class="active"><a href="{{ url('/settings/adding') }}"><i class="fa-solid fa-plus fa-xl text-main me-2"></i>إضافة</a></li>
                  <li><a href="{{ url('/settings/block') }}"><i class="fa-solid fa-ban fa-xl text-red me-2"></i>الحظر</a></li>
              </ul>
          </div>
          <div class="col-md-10">
              <div class="box addcity shadow rounded-3 p-2">
                  <h6 class="bold">أدخل بيانات المدينة بعناية</h6>
                  <div class="container-fluid">
                    <form action="{{route('cities.update',$city->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('Dashboard.city._form',['btn_text'=>'تعديل','city'=>$city,'countries'=>$countries])
                    </form>  
                  </div>
              </div>
          </div>    
      </div>
    </div>
    <script>
        function getValues() {
            const textareaValue = document.getElementById('cityMilestones').value;
            const valuesArray = textareaValue.split('\n').filter(value => value.trim() !== '');
            console.log(valuesArray);
       }
    </script>
    
    </x-dashboard.layout>
    