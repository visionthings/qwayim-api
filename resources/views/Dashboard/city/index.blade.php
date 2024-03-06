<x-dashboard.layout title="المدن">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/city.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">المدن</h2>
    @endsection
      <div class="container d-flex justify-content-between links">
        <a class="main-btn p-2 small" href="{{ route('cities.index') }}">المدن</a>
        <a class="light-btn p-2 small" href="{{ route('cities.create') }}">إضافة مدينة</a>
      </div>

      <div class="container-fluid mt-3">
        <table class="w-100 cities text-center">
          <thead>
            <tr>
              <th>#</th>
              <th>الدولة</th>
              <th>اسم المدينة</th>
              <th>عمليات البحث</th>
              <th>الواجهة الأكثر زيارة</th>
              <th>تعديل</th>

              <th>عرض التفاصيل</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($cities as $key => $city)

            <tr>
              <td>{{$key+1}}</td>
              <td>
                <img src="{{$city->getFirstMediaUrl('flag')}}" width="35" height="auto" alt="flag">
              </td>

              <td>
                {{$city->name}}
              </td>
              <td>
                {{$city->search_count}}
              </td>
              <td>
                  @if($city->places->count())
                    {{$city->places->first()->name}}
                    @else
                    لا يوجد اماكن حتي الان
                  @endif
            </td>
            <td>
              <a href="{{route('cities.edit',$city->id)}}">
                تعديل
              </a>
            </td>
              <td>
                <a href="{{route('cities.show',$city->id)}}" class="main-btn">التفاصيل</a>
              </td>

            </tr>
            @empty
              <tr class="bg-gray">
                <td colspan="7" class="bold">لا يوجد اي مدينة حتي الان</td>
              </tr>
            @endforelse

          </tbody>
        </table>
      </div>
    </x-dashboard.layout>
