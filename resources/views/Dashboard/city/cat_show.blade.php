<x-dashboard.layout title="تفاصيل القسم">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/city.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">مكة المكرمة <small>الفنادق</small></h2>
    @endsection
    <div class="container d-flex justify-content-between links">
        <a class="light-btn p-2 small" href="{{ route('cities.index')}}">المدن</a>
        {{-- <a class="main-btn p-2 small" href="{{ route('cities.show',$getCityPlacesByCategoryId->id) }}">الأقسام</a> --}}
    </div>
    <div class="container mt-3">
        <form action="{{URL::current()}}" method="GET" class="w-100">
            <div class="row w-100 align-items-center">
                <div class="col-sm-2 col-4 text-center mb-2">
                    <label for="city">المدينة</label>
                </div>
                <div class="col-sm-3 col-8 mb-2">
                    <select name="city_id" id="city" class="form-control form-select">
                      @foreach ($cities as $city)
                        <option value="{{$city->id}}" @if(request('city_id') == $city->id)  selected @endif>{{$city->name}}</option>
                      @endforeach
                        
                    </select>
                </div>
                <div class="col-sm-2 col-4 text-center mb-2">
                    <label for="category">القسم</label>
                </div>
                <div class="col-sm-3 col-8 mb-2">
                    <select name="category_id" id="category" class="form-control form-select">
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if(request('category_id') == $category->id)  selected @endif>{{$category->name}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-sm-2 mb-2">
                  <button type="submit" class="main-btn p-2 small d-block ms-auto">جلب البيانات</button>
                </div>  
            </div>
        </form>
        
        <div class="details shadow rounded-3 p-3 mt-3">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="small bold m-0">أبرز <span>{{$category->name}}</span></h6>
                <h6 class="small m-0">الأحدث  <i class="fa-solid fa-chevron-down"></i></h6>
            </div>

            <table class="w-100 text-center details">
                <thead>
                  <tr>
                    <th></th>
                    <th class="text-start">الاسم</span></td>
                    <th>عمليات البحث</th>
                    <th>التعليقات</th>
                    <th>التقييمات</th>
                    <th>الأسئلة</th>
                    <th>المقترحات</th>
                    <th>تعديل</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($getCityPlacesByCategoryId as $places)
                    <tr>
                      <td class="bold">1-</td>
                      <td class="text-start">
                        {{$places->name}}
                      </td>
                      <td>283</td>
                      <td>
                        {{$places->comments_count}}
                      </td>
                      <td>180</td>
                      <td>5</td>
                      <td>7</td>
                      <td>
                        <a href="{{route('cities.place.edit.view',$places->id)}}">
                          تعديل
                        </a>
                      </td>
                      <td class="text-main">
                        <label for="bookmarkCheckbox1" role="button">
                          <input type="checkbox" id="bookmarkCheckbox1" onchange="toggleBookmark('bookmarkIcon1', this)" hidden>
                          <i id="bookmarkIcon1" class="fas fa-regular fa-bookmark"></i>
                        </label>
                      </td>
                      <td class="text-red"><i class="fa-solid fa-trash-can" role="button" onclick="showPlacePop()"></i></td>
                      <td class="text-main"><i class="fa-solid fa-eye" role="button"></i></td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="10">لا يوجد بيانات</td>
                    </tr>
                  @endforelse
                            
                
                </tbody>
              </table>
        </div>
    </div>
    </x-dashboard.layout>
    