<x-dashboard.layout title="صفحة المتابع">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/subscriptions.css')}}" />
    @endpush
    @section('navContent')
          <h2 id="navhead" class="h1 mb-0">المشتركين <small class="ms-2">عبدالله راشد</small></h2>
    @endsection

    <div class="row user-profile g-3 mb-3">
      
        <div class="col-md-4">
            <div class="card shadow rounded-3 p-3 h-100 text-center">
                <img src="{{asset('assets/images/person.png')}}" class="rounded-circle person-img" alt="">
                <h6 class="bold">{{$subscriper->name}}</h6>
                <p class="small text-muted">
                    {{$subscriper->email}}
                </p>
                <h6 class="bold small">#{{$subscriper->id}}</h6>
            </div>
         </div>
        <div class="col-md-5">
            <div class="card shadow rounded-3 p-3 h-100 d-flex flex-column justify-content-center">
                <h6 class="labelhead">الدولة</h6>
                <div class="d-flex align-items-center mb-3">
                    <img src="{{asset('assets/images/sa.png')}}" width="35"><h6 class="m-0 ms-2 small">
                        <span>{{Country::countryCode($subscriper->country_code)}}</span>،<span>{{$subscriper->city}}</span></h6></div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <h6 class="labelhead">النوع</h6>
                        <span class="userinfo">
                            @if($subscriper->gender==='male')
                                ذكر
                            @else 
                                انثي
                            @endif
                        </span>
                    </div>
                    <div class="col-6 mb-3">
                        <h6 class="labelhead">تاريخ الإشتراك</h6>
                        <span class="userinfo">{{$subscriper->created_at->format('d-m-Y')}}</span>
                    </div>
                    <div class="col-6 mb-3">
                        <h6 class="labelhead">تاريخ الميلاد</h6>
                        <span class="userinfo">
                            {{$subscriper->date_of_birth->format('d-m-Y')}}
                        </span>
                    </div>
                    <div class="col-6 mb-3">
                        <h6 class="labelhead">الظهور</h6>
                        @if($subscriper->online)

                            <span class="userinfo d-flex align-items-center"><div class="cir cir-active me-2"></div>
                                    متصل الآن
                            </span>

                        @else
                            <span class="userinfo d-flex align-items-center"><div class="cir cir-active me-2"></div>
                                غير متصل
                            </span>

                        @endif
                        {{-- <span class="userinfo d-flex align-items-center"><div class="cir cir-notactive me-2"></div>غير متصل الآن</span> --}}
                    </div>
                </div>
                
            </div>
         </div>
        <div class="col-md-3">
            <div class="card btns shadow rounded-3 p-3 h-100 d-flex flex-column justify-content-around">
                <label for="bookmarkCheckbox1" role="button" class="">
                    <input type="checkbox" id="bookmarkCheckbox1" onchange="toggleLabelClass(this); toggleBookmark('bookmarkIcon1', this)" hidden>
                    <i id="bookmarkIcon1" class="fas fa-regular fa-bookmark"></i>
                    <span id="bookmarkText">إضافة للمفضلة</span>
                </label>
                <button type="button" id="sendMessage" class="light-btn"><i class="fa-regular fa-comment-dots"></i><span>إرسال رسالة</span></button>
                 @if($subscriper->status !=='block')   
                <form action="{{route('subscriptions.update',$subscriper->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" id="blockUser" class="light-btn"><i class="fa-solid fa-ban text-red"></i><span>حظر</span></button>
                </form>
                @else
                <span>محظور</span>
                @endif
                <button type="button" id="deleteUser" class="red-btn"  onclick="showUserPop()"><i class="fa-solid fa-trash-can"></i><span>حذف</span></button>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow rounded-3 p-3">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <h6 class="bold">تعليقات المشترك</h6>
                    <span>الأحدث <i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <table class="w-100 comm">
                    <thead>
                        <tr>
                            <td></td>
                            <td class="w-50">التعليق</td>
                            <td>التاريخ</td>
                            <td>الوقت</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscriper->comments as $key=>$comment)
                            <tr>
                                <td>{{$key+1}}-</td>
                                <td>{{$comment->content}}</td>
                                <td>{{$comment->created_at->format('d-m-Y')}}</td>
                                <td>{{$comment->created_at->format('h:i a')}}</td>
                                <td><a href="" class="main-btn small"><i class="fa-regular fa-eye"></i> عرض</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center rounded-3">لا يوجد بيانات حتي الان</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow rounded-3 p-3 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="bold">المقترحات المرسلة</h6>
                    <span>الأحدث <i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <table class="w-100 proposal">
                    <tbody>
                        <tr>
                            <td>1-</td>
                            <td><p>يوجد فرع آخر للسوبر ماركت أتمنى نشره في قوائم</p></td>
                            <td><a href="" class="main-btn small">التفاصيل</a></td>
                        </tr>
                        <tr>
                            <td>2-</td>
                            <td><p>أتمنى إضافة أكثر من رقم هاتف لتلك العيادة</p></td>
                            <td><a href="" class="main-btn small">التفاصيل</a></td>
                        </tr>
                        <tr>
                            <td>3-</td>
                            <td><p>أرجو تحديث الموقع الجغرافي لهذا المول</p></td>
                            <td><a href="" class="main-btn small">التفاصيل</a></td>
                        </tr>
                        <tr>
                            <td>4-</td>
                            <td><p>أتمنى ارسال الموقع الالكترنوني لهذا المطعم</p></td>
                            <td><a href="" class="main-btn small">التفاصيل</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow rounded-3 p-3 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="bold">الأسئلة</h6>
                    <span>الأحدث <i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <table class="w-100 comm">
                    <thead>
                        <tr>
                            <td></td>
                            <td>السؤال</td>
                            <td>التاريخ</td>
                            <td>الوقت</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscriper->questions as $key => $question)
                      
                            <tr>
                                <td>{{$key+1}}-</td>
                                <td>{{$question->question}}</td>
                                <td>{{$question->created_at->format('m-d-Y')}}</td>
                                <td>{{$question->created_at->format('h:i a')}}</td>
                                <td><a href="" class="main-btn samll"><i class="fa-regular fa-eye"></i> عرض</a></td>
                            </tr>
                       
                             
                        @empty
                                <tr style="text-align: center;">
                                    <td colspan="5"> لا يوجد بيانات</td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow rounded-3 p-3 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="bold">إجابات الأسئلة</h6>
                    <span>الأحدث <i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <table class="w-100 comm">
                    <thead>
                        <tr>
                            <td></td>
                            <td>الإجابة</td>
                            <td>التاريخ</td>
                            <td>الوقت</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscriper->answers as $key => $answers)
                        <tr>
                            <td>{{$key+1}}-</td>
                            <td>{{$answers->answer}}</td>
                            <td>{{$answers->created_at->format('d-m-Y')}}</td>
                            <td>{{$answers->created_at->format('h:i a')}}</td>
                            <td><a href="" class="main-btn small"><i class="fa-regular fa-eye"></i> عرض</a></td>
                        </tr>
                        @empty
                        <tr style="text-align: center;">
                            <td colspan="5">لا يوجد بيانات حتي الان</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <script>
        function toggleLabelClass(checkbox) {
        var label = checkbox.parentNode;
        if (checkbox.checked) {
            label.classList.add('checked');
        } else {
            label.classList.remove('checked');
        }
    }
    </script>
    
    </x-dashboard.layout>
    