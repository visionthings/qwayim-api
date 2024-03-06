<x-dashboard.layout title="التقارير - التفاعل">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/reports.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">التقارير <small>التفاعل</small></h2>
    @endsection
    @push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('assets/js/reportChart.js')}}"></script>
    @endpush

    <div class="container-fluid">
        <h6 class="bold"><i class="fa-solid fa-calendar-days"></i> الشهر <span>ديسمبر 2023</span></h6>
        <div class="row">
            <div class="partition col-md-6">
                <h6 class="bold">التعليقات</h6>
                <div class="row">
                    <div class="col-6">
                        <div class="box rounded-3 bg-lightgray p-3 d-flex justify-content-between align-items-center">
                            <div class="line"></div>
                            <div class="w-100 text-center">
                              <div class="d-flex justify-content-around w-100">
                                <h6>تعليقات الشهر</h6>
                                <i class="fa-regular fa-comments text-main"></i>
                              </div>
                              <h4>{{$currentMonthComments}}</h4>
                              <p class="small">
                                {{-- <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>2.4</strong> % </span> --}}
                                @if($currentMonthComments == $lastMonthComments)
                                <span class="bold text-main">
                                  <i class="fa-solid fa-turn-up me-1"></i>
                                  <strong>
                                    متساوين

                                  </strong>
                                </span>
                                
                                @elseif($currentMonthComments > $lastMonthComments)
                                <span class="bold text-main">
                                  <i class="fa-solid fa-turn-up me-1"></i>
                                  <strong>
                                    {{$currentMonthComments}}
                                  </strong>
                                </span>
                                @else
                                  <span class="bold text-red">
                                    <i class="fa-solid fa-turn-down me-1"></i>
                                  </span>                                  
                                  <strong>
                                    {{$currentMonthComments - $lastMonthComments}}
                                  </strong>
                                </span>
                                @endif  

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
                                <h6>إجمالى التعليقات</h6>
                                <i class="fa-solid fa-comments text-main"></i>
                              </div>
                              <h4>{{$getAllComments}}</h4>
                              <p class="small">
                                {{-- <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>2.4</strong> % </span> --}}
                                <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i>
                                  <strong>
                                    {{ $currentMonthComments}}
                                  </strong>
                                </span>
                                زيادة هذا الشهر
                              </p>
                            </div>
                        </div>    
                    </div>

                </div>
            </div>       
            <div class="partition col-md-6">
                <h6 class="bold">التقييمات</h6>
                <div class="row">
                    <div class="col-6">
                        <div class="box rounded-3 bg-lightgray p-3 d-flex justify-content-between align-items-center">
                            <div class="line"></div>
                            <div class="w-100 text-center">
                              <div class="d-flex justify-content-around w-100">
                                <h6>تقييمات الشهر</h6>
                                <i class="fa-regular fa-star text-main"></i>
                              </div>
                              <h4>232</h4>
                              <p class="small">
                                {{-- <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>2.4</strong> % </span> --}}
                                <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i><strong>2.4</strong> % </span>
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
                                <h6>إجمالى التقييمات</h6>
                                <i class="fa-solid fa-star text-main"></i>
                              </div>
                              <h4>654</h4>
                              <p class="small">
                                {{-- <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>2.4</strong> % </span> --}}
                                <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i><strong>9.2</strong> % </span>
                                زيادة هذا الشهر
                              </p>
                            </div>
                        </div>    
                    </div>

                </div>
            </div>       
           
            <div class="partition col-md-6">
                <h6 class="bold">الأسئلة</h6>
                <div class="row">
                    <div class="col-6">
                        <div class="box rounded-3 bg-lightgray p-3 d-flex justify-content-between align-items-center">
                            <div class="line"></div>
                            <div class="w-100 text-center">
                              <div class="d-flex justify-content-around w-100">
                                <h6>أسئلة الشهر</h6>
                                <i class="fa-regular fa-circle-question text-main"></i>
                              </div>
                              <h4>{{$currentMonthQuestions}}</h4>
                              <p class="small">
                                @if($currentMonthQuestions == $lastMonthQuestions)
                                <span class="bold text-main">
                                  <i class="fa-solid fa-turn-up me-1"></i>
                                  <strong>
                                    متساوين

                                  </strong>
                                </span>
                                
                                @elseif($currentMonthQuestions > $lastMonthQuestions)
                                <span class="bold text-main">
                                  <i class="fa-solid fa-turn-up me-1"></i>
                                  <strong>
                                    {{$currentMonthQuestions}}
                                  </strong>
                                </span>
                                @else
                                  <span class="bold text-red">
                                    <i class="fa-solid fa-turn-down me-1"></i>
                                  </span>                                  
                                  <strong>
                                    {{$currentMonthQuestions - $lastMonthQuestions}}
                                  </strong>
                                </span>
                                @endif  
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
                                <h6>إجمالى الأسئلة</h6>
                                <i class="fa-solid fa-circle-question text-main"></i>
                              </div>
                              <h4>{{$getAllQuestions}}</h4>
                              <p class="small">
                                @if($getAllQuestions - $lastMonthQuestions > $lastMonthQuestions)
                                

                                <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i><strong>{{$getAllQuestions - $lastMonthQuestions}}</strong> </span>
                                اكبر هذا الشهر
                                @else
                                <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>{{$getAllQuestions - $lastMonthQuestions}}</strong> </span>
                                اقل هذا الشهر
                                @endif
                              </p>
                            </div>
                        </div>    
                    </div>

                </div>
            </div>       
            <div class="partition col-md-6">
                <h6 class="bold">المقترحات المرسلة</h6>
                <div class="row">
                    <div class="col-6">
                        <div class="box rounded-3 bg-lightgray p-3 d-flex justify-content-between align-items-center">
                            <div class="line"></div>
                            <div class="w-100 text-center">
                              <div class="d-flex justify-content-around w-100">
                                <h6>مقترحات الشهر</h6>
                                <i class="fa-regular fa-face-smile-wink text-main"></i>
                              </div>
                              <h4>{{$thisMonthsuggestion}}</h4>
                              <p class="small">
                                {{-- <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>2.4</strong> % </span> --}}
                                @if ($thisMonthsuggestion > $lastMonthsuggestion)
                                  <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i><strong>{{$thisMonthsuggestion - $lastMonthsuggestion}}</strong> </span>
                               @else
                                  <span class="bold text-main"><i class="fa-solid fa-turn-down me-1"></i><strong>{{$lastMonthsuggestion - $thisMonthsuggestion}}</strong> </span>
                               @endif


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
                                <h6>إجمالى الإقتراحات</h6>
                                <i class="fa-solid fa-face-smile-wink text-main"></i>
                              </div>
                              <h4>{{$getAllSuggestion}}</h4>
                              <p class="small">
                                @if ( $lastMonthsuggestion > $thisMonthsuggestion)
                                  <span class="bold text-red"><i class="fa-solid fa-turn-down me-1"></i><strong>{{$lastMonthsuggestion - $thisMonthsuggestion}}</strong> </span>
                                @else
                                  <span class="bold text-main">0</span>
                                @endif
                                {{-- <span class="bold text-main"><i class="fa-solid fa-turn-up me-1"></i><strong>9.2</strong> % </span> --}}
                                اقل هذا الشهر
                              </p>
                            </div>
                        </div>    
                    </div>

                </div>
            </div>       
        </div>
    </div>

    <div class="container-fluid p-4">
      <div class="d-flex align-items-center justify-content-between">
        <h6 class="bold">إحصائيات التفاعل خلال شهر <span>ديسمبر 2023</span></h6>
        <h6 class="small">الشهر <i class="fa-solid fa-chevron-down"></i></h6>  
      </div>
      <div class="row align-items-center">
        <div class="col-md-9">
          <canvas id="reportChart" class="w-100"></canvas>
        </div>
        <div class="col-md-3 text-center color-hint">
          <div class="d-flex align-items-center">
            <div class="cir cir-comm"></div>
            <p class="m-0">التعليقات</p>
          </div>
          <div class="d-flex align-items-center">
            <div class="cir cir-rate"></div>
            <p class="m-0">التقييمات</p>
          </div>
          <div class="d-flex align-items-center">
            <div class="cir cir-ques"></div>
            <p class="m-0">الأسئلة</p>
          </div>
          <div class="d-flex align-items-center">
            <div class="cir cir-hints"></div>
            <p class="m-0">الإقتراحات</p>
          </div>
        </div>    
      </div>  
    </div>

    </x-dashboard.layout>
    