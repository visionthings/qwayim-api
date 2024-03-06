<x-dashboard.layout title="التقارير - الأكثر بحثاً">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/subscriptions.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/reports.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">التقارير <small>الأكثر بحثاً</small></h2>
    @endsection

    <h6 class="bold">الأكثر بحثاً <i class="fa-solid fa-chevron-up"></i></h6>
    <div class="row g-3 mb-3">
        <div class="col-md-12">
          <div class="card users shadow rounded-3 p-3 h-100">
              <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                  <h6 class="bold m-0">الواجهات الأكثر بحثاً</h6>
                  <div class="d-flex align-items-center">
                      <form action="" class="d-flex me-2">
                          <input type="text" placeholder="البحث" class="form-control me-2">
                          <a href="" class="small main-btn p-1 rounded-1"><i class="fa-solid fa-magnifying-glass"></i></a>
                      </form>
                  </div>
              </div>
              <table class="users-index most-search w-100 ">
                  <thead>
                      <tr>
                          <td></td>
                          <td>الواجهة</td>
                          <td>الدولة</td>
                          <td></td>
                          <td>القسم</td>
                          <td>عمليات البحث</td>
                          <td></td>
                          <td></td>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($bestPlacesSearch as $key => $bestPlaceSearch)
                      <tr>
                        <td>{{$key+1}}-</td>
                        <td>{{$bestPlaceSearch->name}}</td>
                        <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                        <td>{{$bestPlaceSearch->city->name}} {{Country::countryCode($bestPlaceSearch->city->country_code)}}</td>
                        <td>{{$bestPlaceSearch->category->name}}</td>
                        <td>{{$bestPlaceSearch->search_count}}</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox11" role="button">
                              <input type="checkbox" id="bookmarkCheckbox11" onchange="toggleBookmark('bookmarkIcon11', this)" hidden>
                              <i id="bookmarkIcon11" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                          <a href=""><i class="fa-solid fa-arrow-up-right-from-square text-main"></i></a>
                        </td>
                    </tr>
                    @empty
                      <tr>
                        <td colspan="8"  class="bold text-center rounded-3">لا يوجد بيانات حتي الآن</td>
                      </tr>
                    @endforelse
                        
                  </tbody>
              </table>
              {{$bestPlacesSearch->links()}}
          </div>
        </div>
    </div>
    </x-dashboard.layout>
    