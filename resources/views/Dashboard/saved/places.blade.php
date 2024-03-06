<x-dashboard.layout title="العناصر المحفوظة">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/city.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/saved.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">العناصر المحفوظة <small>الواجهات</small></h2>
    @endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <a href="{{route('saveds.index')}}" class="light-btn p-2 d-block">المشتركين</a>
            </div>
            <div class="col-4">
                <a href="{{route('saveds.places.view')}}" class="main-btn p-2 d-block">الواجهات</a>
            </div>
            <div class="col-4">
                <a href="{{route('saveds.comments.view')}}" class="light-btn p-2 d-block">التعليقات</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="details shadow rounded-3 p-3 mt-3">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="small bold m-0">أبرز <span>الفنادق</span></h6>
                <div class="d-flex">
                    <input type="text" placeholder="البحث" class="form-control me-2">
                    <a href="" class="main-btn p-1 small rounded-1"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </div>

            <table class="w-100 text-center details">
                <thead>
                  <tr>
                    <td></td>
                    <td class="text-start">اسم <span>الفندق</span></td>
                    <td>عمليات البحث</td>
                    <td>التعليقات</td>
                    <td>التقييمات</td>
                    <td>الأسئلة</td>
                    <td>المقترحات</td>
                    <td></td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>
                    {{-- اعرض 20 ثم 20 باستخدام pagination --}}
                    
                    @forelse ($favorites as $key=> $place)
                      <tr>
                        <td class="bold">{{$key+1}}-</td>
                        <td class="text-start">{{$place->place->name}}</td>
                        <td>{{$place->place->search_count}}</td>
                        <td>{{$place->place->comments->count()}}</td>
                        <td>180</td>
                        <td>{{$place->place->questions->count()}}</td>
                        <td>7</td>
                        {{-- <td class="text-main">
                          <label for="bookmarkCheckbox1" role="button">
                            <input type="checkbox" id="bookmarkCheckbox1" onchange="toggleBookmark('bookmarkIcon1', this)" hidden>
                            <i id="bookmarkIcon1" class="fas fa-regular fa-bookmark"></i>
                          </label>
                        </td> --}}
                        <td class="text-main"><i class="fa-solid fa-eye" role="button"></i></td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="9" class="bold text-center rounded-3">لا يوجد بيانات</td>
                      </tr>
                    @endforelse
               
                
                </tbody>
              </table>
        </div> 
    </div>

    </x-dashboard.layout>
  