<x-dashboard.layout title="لوحة التحكم">
@push('style')
    <link rel="stylesheet" href="{{asset('assets/css/dashboard/home.css')}}" />
@endpush
@section('navContent')
      <h2 id="navhead" class="h1 mb-0">أهلا بعودتك, <span>هتان عاشور</span></h2>
@endsection


<h6 class="small bold">الاسبوع  <i class="fa-solid fa-chevron-down"></i></h6>


<div class="row g-3 mb-3">
  <div class="col-md-3 col-6">
    <div class="box rounded-3 bg-lightgray p-3 d-flex justify-content-between align-items-center">
      <div class="line"></div>
      <div class="w-100 text-center">
        <div class="d-flex justify-content-around w-100">
          <h6>الاشتراكات</h6>
          <i class="fa-solid fa-users text-main"></i>
        </div>
        <h4>{{$thisWeekSubscripers}}</h4>
        <p class="small">
          {{-- <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>2.4</strong> % </span> --}}
          <span class="bold text-main">
            @if($thisWeekSubscripers > $lastWeekSubscripers)
            <i class="fa-solid fa-turn-up me-1"></i><strong>{{$thisWeekSubscripers - $lastWeekSubscripers }}</strong> </span>
            @else
            <i class="fa-solid fa-turn-down me-1"></i><strong>{{$lastWeekSubscripers- $thisWeekSubscripers }}</strong> </span>

            @endif
          من الإسبوع الماضي
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-6">
    <div class="box rounded-3 bg-gray p-3 d-flex justify-content-between align-items-center">
      <div class="line"></div>
      <div class="w-100 text-center">
        <div class="d-flex justify-content-around w-100">
          <h6>الزوار</h6>
          <i class="fa-solid fa-eye text-main"></i>
        </div>
        <h4>{{$thisWeekVistor}}</h4>
        <p class="small">
          @if($thisWeekVistor > $lastWeekVistor)
          <i class="fa-solid fa-turn-up me-1"></i><strong>{{$thisWeekVistor - $lastWeekVistor }}</strong> </span>
          @else
          <i class="fa-solid fa-turn-down me-1"></i><strong>{{$lastWeekVistor- $thisWeekVistor }}</strong> </span>

          @endif
          {{-- <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i><strong>2.4</strong> % </span> --}}
          من الإسبوع الماضي
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-6">
    <div class="box rounded-3 bg-lightgray p-3 d-flex justify-content-between align-items-center">
      <div class="line"></div>
      <div class="w-100 text-center">
        <div class="d-flex justify-content-around w-100">
          <h6>التعليقات</h6>
          <i class="fa-solid fa-comments text-main"></i>
        </div>
        <h4>{{$thisWeekComments}}</h4>
        <p class="small">
          {{-- <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>1.6</strong> % </span> --}}
          @if($thisWeekComments > $lastWeekComments)
          <i class="fa-solid fa-turn-up me-1"></i><strong>{{$thisWeekComments - $lastWeekComments }}</strong> </span>
          @else
          <i class="fa-solid fa-turn-down me-1"></i><strong>{{$lastWeekComments- $thisWeekComments }}</strong> </span>

          @endif
          من الإسبوع الماضي
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-6">
    <div class="box rounded-3 bg-gray p-3 d-flex justify-content-between align-items-center">
      <div class="line"></div>
      <div class="w-100 text-center">
        <div class="d-flex justify-content-around w-100">
          <h6>التقييمات</h6>
          <i class="fa-solid fa-star text-main"></i>
        </div>
        <h4>34,890</h4>
        <p class="small">
          <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>3.7</strong> % </span>
          {{-- <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i><strong>3.7</strong> % </span> --}}
          من الإسبوع الماضي
        </p>
      </div>
    </div>
  </div>
</div>


<div class="row g-3 mb-3">
  <div class="col-md-5">
    <div class="graph shadow rounded-3 p-3 h-100">
      
      <div class="d-flex align-items-center justify-content-between mb-2">
        <h6 class="small bold m-0">إجمالى الزائرين</h6>
        <p class="m-0 text-muted">سبتمبر</p>
        <h6 class="small m-0">الشهر  <i class="fa-solid fa-chevron-down"></i></h6>
      </div>
      
      <div class="d-flex align-items-center justify-content-center position-relative">
        <canvas id="viewChart"></canvas>
        <p class="centerP">
          <span class="d-block">{{$allVistor}}</span>  
          <span class="d-block">زائر</span>  
        </p>
      </div>

      <h5 class="text-center text-main bold mt-2"><span>{{$thisMonthVistor}}</span> زائر هذا الشهر</h5>

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
    <div class="graph shadow rounded-3 p-3 h-100">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <h6 class="small bold m-0">إحصائيات التعليقات الجديدة شهر <span>سبتمبر 2023</span></h6>
        <h6 class="small m-0">الشهر  <i class="fa-solid fa-chevron-down"></i></h6>
      </div>
      <canvas id="commentChart" class="mt-2 mt-md-5"></canvas>
        
      <h5 class="text-center text-main bold mt-2 mt-md-5"><span id="allComment"></span> تعليق جديد هذا الشهر</h5>
    </div>
  </div>
</div>


<div class="row g-3 mb-2">
    <div class="col-md-5">
      <div class="card shadow rounded-3 p-3 h-100">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="small bold m-0">أبرز الأماكن بحثاً فى شهر <span>سبتمبر 2023</span></h6>
          <h6 class="small m-0">الشهر  <i class="fa-solid fa-chevron-down"></i></h6>
        </div>
        <table class="w-100 text-center search">
          <thead>
            <tr>
              <td></td>
              <td>الواجهة</td>
              <td colspan="2">المدينة</td>
              <td>البحث</td>
              <td>التقييمات</td>
            </tr>
          </thead>
          <tbody>
            {{-- اشهر 5 اماكن فقط --}}
            @forelse ($bestPlacesSearch as $key => $bestPlaceSearch)
            <tr>
              <td class="bold">{{$key+1}}-</td>
              <td>{{$bestPlaceSearch->name}}</td>
              <td><img src="{{asset('assets/images/sa.png')}}" width="20" height="auto" alt="Saudi flag"></td>
              <td>{{$bestPlaceSearch->city->name}}</td>
              <td>{{$bestPlaceSearch->search_count}}</td>
              <td>8790</td>
            </tr>
            @empty
              <tr>
                <td colspan="6" class="bold">لا يوجد بيانات</td>
              </tr>
            @endforelse
            
            
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-7">
      <div class="card shadow rounded-3 p-3 h-100">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="small bold m-0">طلبات الاقتراح والتعديل</span></h6>
          <h6 class="small m-0">الأحدث  <i class="fa-solid fa-chevron-down"></i></h6>
        </div>
        
        <div class="edit w-100 mt-4">
          @forelse ($lastFiveSuggestions as $key => $lastFiveSuggestion)
            <div class="one d-flex align-items-center justify-content-between">
              <span class="bold">{{$key+1}}-</span>
              <span class="w-75"><p>{{$lastFiveSuggestion->content}}</p></span>
              <span class="text-main"><i class="fa-solid fa-comment-dots"></i></span>
              <span class="text-red" role="button" onclick="showHintPop()"><i class="fa-solid fa-trash"></i></span>
            </div>
          @empty
            <p class="bold text-center m-0">لا يوجد بيانات</p>
          @endforelse
        </div>
      </div>
    </div>
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const thisMonthVistor = "{{$thisMonthVistor}}";
      const lastMonthVistor = "{{$lastMonthVistor}}";
      const thisMonthComments = "{{$thisMonthComments}}";
    </script>
    <script src="{{asset('assets/js/charts.js')}}"></script>
    <script>
      
    </script>
@endpush

</x-dashboard.layout>
