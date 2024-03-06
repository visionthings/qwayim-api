<x-dashboard.layout title="{{$city->name}}">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/city.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">مكة المكرمة <small>الأقسام الرئيسية</small></h2>
    @endsection
    <div class="container d-flex justify-content-between links">
        <a class="light-btn p-2 small" href="{{route('cities.index')}}">المدن</a>
        <a class="light-btn p-2 small" href="{{route('cities.news.create', $city->id)}}">إضافة خبر جديد عن المدينة</a>
        <a class="main-btn p-2 small" href="{{ route('cities.place.create',$city->id)}}">إضافة واجهة</a>
    </div>
    <div class="container">
        <div class="row mt-3 cityparts">
            @foreach ($categories as $category)

            <a href="{{ route('city.cat.show.view',[$category->id,$city->id]) }}" class="col-12 px-3 py-3 rounded-4 shadow mb-4 part">
                <h3>
                    {{$category->name}}
                </h3>
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            @endforeach


        </div>
    </div>
    </x-dashboard.layout>
