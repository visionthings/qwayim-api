<x-dashboard.layout title="التقارير - الإشتراكات">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/subscriptions.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/reports.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">التقارير <small>الإشتراكات</small></h2>
    @endsection
    <div class="row g-3 mb-3">
        <div class="col-6">
          <div class="box rounded-3 bg-lightgray p-3 d-flex justify-content-between align-items-center">
            <div class="line"></div>
            <div class="w-100 text-center">
              <div class="d-flex justify-content-around w-100">
                <h6>الإشتراكات هذا الشهر</h6>
                <i class="fa-solid fa-users text-main"></i>
              </div>
              <h4 class="bold">{{$getThisMonthSubscripers->count()}}</h4>
              <p class="small">
                @if ($getThisMonthSubscripers->count() > $lastMonthSubscripers)
                <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i>
                  <strong>
                      {{$getThisMonthSubscripers->count() - $lastMonthSubscripers}}
                  </strong> 
                </span>
                @elseif ($getThisMonthSubscripers->count() == $lastMonthSubscripers)
                  متساوين
                @else
                  <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i>
                    <strong>
                      {{$lastMonthSubscripers - $getThisMonthSubscripers->count()}}

                    </strong> 
                   </span>
                @endif
                {{-- <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>2.4</strong> % </span> --}}
                
                من الشهر السابق
              </p>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="box rounded-3 bg-gray p-3 d-flex justify-content-between align-items-center">
            <div class="line"></div>
            <div class="w-100 text-center">
              <div class="d-flex justify-content-around w-100">
                <h6>إجمالى الإشتراكات</h6>
                <i class="fa-solid fa-users text-main"></i>
              </div>
              <h4 class="bold">{{$getAllSubscripers}}</h4>
              <p class="small">
                @if ($getAllSubscripers - $lastMonthSubscripers > $lastMonthSubscripers)
                <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i>
                  <strong>
                      {{$getAllSubscripers - $lastMonthSubscripers}}
                  </strong> 
                </span>
                @elseif ($getAllSubscripers - $lastMonthSubscripers == $lastMonthSubscripers)
                  متساوين
                @else
                  <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i>
                    <strong>
                      {{$lastMonthSubscripers - $getAllSubscripers}}
                    </strong> 
                   </span>
                @endif                {{-- <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i><strong>2.4</strong> % </span> --}}
                من الشهر السابق
              </p>
            </div>
          </div>
        </div>
    </div>
    
    <div class="row g-3 mb-5">
        <div class="col-md-12">
          <div class="card users shadow rounded-3 p-3 h-100">
              <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                  <h6 class="bold m-0">الإشتراكات الجديدة</h6>
                  <div class="d-flex align-items-center">
                      <form action="" class="d-flex me-2">
                          <input type="text" placeholder="البحث" class="form-control me-2">
                          <a href="" class="small main-btn p-1 rounded-1"><i class="fa-solid fa-magnifying-glass"></i></a>
                      </form>
                  </div>
              </div>
              {{-- أحدث 10 اشتراك فقط--}}
              <table class="users-index w-100">
                  <thead>
                      <tr>
                          <td></td>
                          <td></td>
                          <td>المشتركين </td>
                          <td>الدولة</td>
                          <td></td>
                          <td>تاريخ الإشتراك</td>
                          <td>ID</td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($getThisMonthSubscripers as $key => $getThisMonthSubscriper)
                      
                   
                      <tr>
                          <td>{{$key+1}}}-</td>
                          <td><img src="{{$getThisMonthSubscriper->getFirstMediaUrl('user')}}" width="35" height="35" class="rounded-circle"></td>
                          <td><h6 class="bold m-0 small">{{$getThisMonthSubscriper->name}}</h6><span class="text-muted">{{$getThisMonthSubscriper->email}}</span></td>
                          <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                          <td> {{$getThisMonthSubscriper->city}} , {{Country::countryCode($getThisMonthSubscriper->country_code)}}</td>
                          <td>
                            @if($getThisMonthSubscriper->created_at)
                              {{$getThisMonthSubscriper->created_at->format('d-m-Y')}}
                            @else
                              -
                            @endif
                          </td>
                          <td>#{{$getThisMonthSubscriper->id}}</td>
                          <td class="text-main">
                              <label for="bookmarkCheckbox1" role="button">
                                <input type="checkbox" id="bookmarkCheckbox1" onchange="toggleBookmark('bookmarkIcon1', this)" hidden>
                                <i id="bookmarkIcon1" class="fas fa-regular fa-bookmark"></i>
                              </label>
                          </td>
                          <td class="text-red">
                              <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                          </td>
                          <td>
                              <div class="dropdown">
                                  <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                  </span>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{route('subscriper.profile',$getThisMonthSubscriper->id)}}">عرض الملف الشخصي</a></li>
                                    <li><a class="dropdown-item" href="#">حظر</a></li>
                                  </ul>
                                </div>
                          </td>
                      </tr>
                    @empty
                        <tr>
                          <td colspan="10"  class="bold text-center rounded-3">لا يوجد بيانات حتي الان</td>
                        </tr>
                    @endforelse
                  </tbody>
              </table>
          </div>
        </div>
    </div>
      

    <div class="row g-3 mb-3">
        <div class="col-md-12">
          <div class="card users shadow rounded-3 p-3 h-100">
              <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                  <h6 class="bold m-0">الإشتراكات الملغاة</h6>
                  <div class="d-flex align-items-center">
                      <form action="" class="d-flex me-2">
                          <input type="text" placeholder="البحث" class="form-control me-2">
                          <a href="" class="small main-btn p-1 rounded-1"><i class="fa-solid fa-magnifying-glass"></i></a>
                      </form>
                  </div>
              </div>
              {{-- أحدث 10 اشتراك فقط--}}
              <table class="users-index w-100">
                  <thead>
                      <tr>
                          <td></td>
                          <td></td>
                          <td>المشتركين </td>
                          <td>الدولة</td>
                          <td></td>
                          <td>تاريخ الإشتراك</td>
                          <td>تاريخ إلغاء</td>
                          <td>ID</td>
                          <td></td>
                          <td></td>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($getThisMonthCancelSubscripers as $getThisMonthCancelSubscriper)
                        <tr>
                            <td>1-</td>
                            <td><img src="{{$getThisMonthCancelSubscriper->getFirstMediaUrl('user')}}" width="35" height="35" class="rounded-circle"></td>
                            <td><h6 class="bold m-0 small">{{$getThisMonthCancelSubscriper->name}}</h6><span class="text-muted">{{$getThisMonthCancelSubscriper->email}}</span></td>
                            <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                            <td> {{$getThisMonthCancelSubscriper->city}} , {{Country::countryCode($getThisMonthCancelSubscriper->country_code)}}</td>
                            <td>
                              @if($getThisMonthCancelSubscriper->created_at)
                                {{$getThisMonthCancelSubscriper->created_at->format('d-m-Y')}}
                              @else
                                -
                              @endif
                            </td>
                            <td>
                              @if($getThisMonthCancelSubscriper->updated_at)
                                {{$getThisMonthCancelSubscriper->updated_at->format('d-m-Y')}}
                              @else
                                -
                              @endif
                            </td>
                            <td>#132342</td>
                            <td class="text-main">
                                <label for="bookmarkCheckbox11" role="button">
                                  <input type="checkbox" id="bookmarkCheckbox11" onchange="toggleBookmark('bookmarkIcon11', this)" hidden>
                                  <i id="bookmarkIcon11" class="fas fa-regular fa-bookmark"></i>
                                </label>
                            </td>
                            <td>
                              <a href="{{route('subscriper.profile',$getThisMonthCancelSubscriper->id)}}"><i class="fa-regular fa-user text-main"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                          <td colspan="10" class="bold text-center rounded-3">لا يوجد بيانات حتي الان</td>
                        </tr>
                    @endforelse
              
                  </tbody>
              </table>
          </div>
        </div>
    </div>
     
    
    </x-dashboard.layout>
    