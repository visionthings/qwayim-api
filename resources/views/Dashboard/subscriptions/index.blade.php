<x-dashboard.layout title="المتابيعن">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/subscriptions.css')}}" />
    @endpush
    @section('navContent')
          <h2 id="navhead" class="h1 mb-0">المشتركين</h2>
    @endsection
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{asset('assets/js/charts.js')}}"></script>
    @endpush
    
    <div class="row g-3 mb-3">
      <div class="col-md-5">
        <div class="graph shadow rounded-3 p-3 h-100">
          
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="small bold m-0">إجمالى المشتركين</h6>
            <p class="m-0 text-muted">سبتمبر</p>
            <h6 class="small m-0">الشهر  <i class="fa-solid fa-chevron-down"></i></h6>
          </div>
          
          <div class="d-flex align-items-center justify-content-center position-relative">
            
            <canvas id="subscribeChart"></canvas>
            <p class="centerP">
              <span class="d-block">1</span>  
              <span class="d-block">مشترك</span>                
            </p>
          </div>
          {{-- <span class="d-block">الشهر الحالي {{$currentMonthSubscripers}} </span>
          <span class="d-block">الشهر الماضي {{$lastMonthSubscripers}} </span> --}}

          <h5 class="text-center text-main bold mt-2"><span>1</span> مشترك هذا الشهر</h5>
    
          <div class="color-hint d-flex justify-content-around">
            <p class="d-flex align-items-center">
              <span class="circle-hint bg-main"></span>
              <strong>الشهر الحالى</strong>
            </p>
            <p class="d-flex align-items-center">
              <span class="circle-hint bg-red"></span>
              <strong>الشهر السابق</strong>
            </p> 
          </div>
          
        </div>
      </div>
    
      <div class="col-md-7">
        <div class="graph shadow rounded-3 p-3 h-100 d-flex flex-column align-items-center justify-contetn-between">
          <div class="d-flex align-items-center justify-content-between w-100 mb-2">
            <h6 class="small bold m-0">إحصائيات الإشتراكات</h6>
            <h6 class="small m-0">السنة  <i class="fa-solid fa-chevron-down"></i></h6>
            
            
          </div>
          
          {{-- <h6 class="small m-0">{{$newSubscripers}}</h6> --}}
          {{-- <h6 class="small m-0">{{$cancelSubscripers}}</h6> --}}

          <canvas id="commentChart" class="mt-2 mt-md-5 d-none"></canvas>
          <canvas id="supChart" class="mt-2 mt-md-5 h-75"></canvas>
    

          <div class="color-hint d-flex justify-content-around w-100">
            <p class="d-flex align-items-center">
              <span class="circle-hint bg-main"></span>
              <strong>الإشتراكات الجديدة</strong>
            </p>
            <p class="d-flex align-items-center">
              <span class="circle-hint bg-red"></span>
              <strong>الإشتراكات الملغاة</strong>
            </p> 
          </div>
        </div>
      </div>

      <div class="col-md-5">
        <div class="card shadow rounded-3 p-3 h-100">
            <h6 class="small bold mb-2">البيانات الديموغرافية للمتابعين</h6>
            
            <table class="prog-table w-100">
                <tbody>
                    <tr>
                        <td colspan="3"><h6 class="small bold m-0 text-muted">الدولة</h6></td>
                    </tr>
                    {{$getDataGroupByCountryTotal}}
                    @forelse ($getDataGroupByCountry as $DataGroupByCountry)
                    <tr>
                        <td>
                            <span class="small bold text-black">
                            {{Country::countryCode($DataGroupByCountry->country_code)}}        
                            </span>
                        </td>
                        <td class="w-75">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{$DataGroupByCountry->count}}%" aria-valuenow="{{$DataGroupByCountry->count}}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td><span class="bold text-black">{{$DataGroupByCountry->count}}%</span></td>
                    </tr>
                    @empty
                    <tr>
                        <td class="bold">
                            لا يوجد بيانات حتي الان
                        </td>
                    </tr>
                    @endforelse
              
                   
                </tbody>
            </table>
            
        </div>
      </div>
  
      <div class="col-md-7">
        <div class="card top-box shadow rounded-3 p-3 h-100">
            <h6 class="small bold mb-2">أبرز المشتركين</h6>
            <table class="w-100 top-sup">
                <tbody>
                    @foreach ($superiorSubscripers as $key=> $superiorSubscriper)
                    <tr>
                        <td>{{$key+1}}-</td>
                        <td><img src="{{$superiorSubscriper->getFirstMediaUrl('user')}}" width="35" height="35" class="rounded-circle" alt=""></td>
                        <td>
                            <h6 class="small bold m-0">{{$superiorSubscriper->name}}</h6>
                            <span class="small text-muted">{{$superiorSubscriper->email}}</span>
                        </td>
                        <td class="text-center">
                            <i class="fa-regular fa-message text-main d-block"></i>
                            <span>{{$superiorSubscriper->comments_count}}</span>
                        </td>
                        <td class="text-center">
                            <i class="fa-solid fa-star text-main d-block"></i>
                            <span>63</span>
                        </td>
                        <td>
                            <img src="{{asset('assets/images/sa.png')}}" width="25" alt="">
                        </td>
                        <td class="small">
                            {{Country::countryCode($superiorSubscriper->country_code)}}
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
          </div>
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="card users shadow rounded-3 p-3 h-100">
            <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                <h6 class="small bold m-0">المشتركين</h6>
                <div class="d-flex align-items-center">
                    <form action="" class="d-flex me-2">
                        <input type="text" placeholder="البحث" class="form-control me-2">
                        <a href="" class="small main-btn p-1 rounded-1"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </form>
                    <a href="{{url('/subscriptions/allusers')}}" class="small">كل المشتركين</a>
                </div>
            </div>
            {{-- عرض 10 ثم 10 واقلب pagination--}}
            <table class="users-index w-100">
                <thead>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>الإسم</td>
                        <td></td>
                        <td>الدولة</td>
                        <td>تاريخ الإنضمام</td>
                        <td>ID</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subscripers as $key => $subscriper)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td><img src="{{$subscriper->getFirstMediaUrl('user')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">
                        {{$subscriper->name}}    
                        </h6>
                        <span>
                            {{$subscriper->email}}    
                        </span>
                        </td>
                        <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                        <td>{{$subscriper->city}}، {{Country::countryCode($subscriper->country_code)}}</td>
                        <td>{{$subscriper->created_at->format('Y-m-d')}}</td>
                        <td>#{{$subscriper->id}}</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox1" role="button">
                              <input type="checkbox" id="bookmarkCheckbox1" onchange="toggleBookmark('bookmarkIcon1', this)" hidden>
                              <i id="bookmarkIcon1" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li>
                                    <form action="{{route('subscriptions.update',$subscriper->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit">حظر</button>                                        
                                    </form>
                                  </li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    
                    @empty
                        <tr>
                            <td colspan="10" class="text-center rounded-3">لا يوجد مشتركين حتي الان</td>
                        </tr>
                    @endforelse
                    
                    
                </tbody>
            </table>
            {{$subscripers->links()}}
        </div>
      </div>

    </div>
    
    
    </x-dashboard.layout>
    