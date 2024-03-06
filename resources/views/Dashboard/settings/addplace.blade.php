<x-dashboard.layout title="الإعدادات والتحكم">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/settings.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الإعدادت والتحكم <small>إضافة واجهة</small></h2>
    @endsection
    
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-2">
              <ul class="links p-2">
                <li><a href="{{ route('admins.index') }}"><i class="fa-solid fa-user-pen fa-lg text-main me-2"></i>الأدمن</a></li>
                <li><a href="{{ route('notifications.index') }}"><i class="fa-solid fa-bell fa-lg text-main me-2"></i>الإشعارات</a></li>
                <li class="active"><a href="{{ url('/settings/adding') }}"><i class="fa-solid fa-plus fa-xl text-main me-2"></i>إضافة</a></li>
                <li><a href="{{ route('blocks.index') }}"><i class="fa-solid fa-ban fa-xl text-red me-2"></i>الحظر</a></li>
            </ul>
          </div>
          <div class="col-md-10">
              <div class="box shadow rounded-3 p-2">
                  <h6 class="bold">إملأ كافة البيانات بعناية لتظهر الى المستخدم بشكل صحيح</h6>
                  <div class="container-fluid">
                    <form action="">
                        <div class="row">
                            <h6>البيانات الأساسية</h6>
                            <div class="col-md-6 mb-2">
                                <label for="city">المدينة</label>
                                <select name="" id="city" class="form-control form-select">
                                    <option value="القاهرة">القاهرة</option>
                                    <option value="الجيزة">الجيزة</option>
                                    <option value="جدة">جدة</option>
                                    <option value="الرياض">الرياض</option>
                                    <option value="">...</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="city">القسم</label>
                                <select name="" id="city" class="form-control form-select">
                                    <option value="الفنادق">الفنادق</option>
                                    <option value="المطاعم">المطاعم</option>
                                    <option value="المقاهي">المقاهي</option>
                                    <option value="الملاهي">الملاهي</option>
                                    <option value="الترفيه">الترفيه</option>
                                    <option value="التسوق">التسوق</option>
                                    <option value="الأحياء">الأحياء</option>
                                    <option value="المكاتب السياحية">المكاتب السياحية</option>
                                    <option value="الطب">الطب</option>
                                    <option value="المساجد">المساجد</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="placeName">إسم الواجهة</label>
                                <input type="text" id="placeName" class="form-control" placeholder="الاسم">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="mapLink">رابط لوكيشن جوجل ماب</label>
                                <input type="text" id="mapLink" class="form-control" placeholder="Google Maps link">
                            </div>
                            <h6>بيانات إضافية</h6>
                            <div class="col-md-6 mb-2">
                                <label for="placeDescription">وصف الواجهة</label>
                                <textarea name="" id="placeDescription" class="form-control" placeholder="الوصف"></textarea>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="images">صور خاصة بالواجهة</label>
                                <input type="file" id="images" class="form-control" accept="images/*" multiple>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="airport">أقرب مطار</label>
                                <input type="text" id="airport" class="form-control" placeholder="الاسم">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="airportDistance">يبعد عن الموقع مسافة</label>
                                <input type="text" id="airportDistance" class="form-control" placeholder="ادخل المسافة (كم)">
                            </div>
                            <h6>بيانات التواصل</h6>
                            <div class="col-lg-4 col-md-6 mb-2">
                                <label for="phone">رقم الهاتف</label>
                                <input type="tel" id="phone" class="form-control" placeholder="الهاتف">
                            </div>
                            <div class="col-lg-4 col-md-6 mb-2">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="email" id="email" class="form-control" placeholder="البريد">
                            </div>
                            <div class="col-lg-4 col-md-6 mb-2">
                                <label for="email">الموقع الإلكتروني</label>
                                <input type="text" id="email" class="form-control" placeholder="الموقع الإلكتروني">
                            </div>
                            <div class="col-lg-4 col-md-6 mb-2">
                                <label for="facebook">رابط فيس بوك</label>
                                <input type="text" id="facebook" class="form-control" placeholder="فيس بوك">
                            </div>
                            <div class="col-lg-4 col-md-6 mb-2">
                                <label for="instagram">رابط إنسجرام</label>
                                <input type="text" id="instagram" class="form-control" placeholder="إنستجرام">
                            </div>
                            <div class="col-lg-4 col-md-6 mb-2">
                                <label for="snap">رابط سناب شات</label>
                                <input type="text" id="snap" class="form-control" placeholder="سناب شات">
                            </div>
                            <h6 class="bold">المميزات</h6>
                            <h6 class="small">مميزات عامة</h6>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="wifi" id="wifi">
                                    <label class="form-check-label" for="wifi">
                                        <i class="fa-solid fa-wifi text-main"></i> الواى فاى
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="garage" id="garage">
                                    <label class="form-check-label" for="garage">
                                        <i class="fa-solid fa-car text-main"></i> جراج سيارات
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="cash" id="cash">
                                    <label class="form-check-label" for="cash">
                                        <i class="fa-solid fa-money-bill text-main"></i> الدفع كاش
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="visa" id="visa">
                                    <label class="form-check-label" for="visa">
                                        <i class="fa-brands fa-cc-visa text-main"></i> الدفع بالطاقة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="aircondetion" id="aircondetion">
                                    <label class="form-check-label" for="aircondetion">
                                        <i class="fa-solid fa-snowflake text-main"></i> تكييف
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="wheelChair" id="wheelChair">
                                    <label class="form-check-label" for="wheelChair">
                                        <i class="fa-solid fa-wheelchair text-main"></i> كراسي متحركة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="kidsArea" id="kidsArea">
                                    <label class="form-check-label" for="kidsArea">
                                        <i class="fa-solid fa-children text-main"></i> ألعاب أطفال
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="TV" id="TV">
                                    <label class="form-check-label" for="TV">
                                        <i class="fa-solid fa-tv text-main"></i> تلفاز
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="security" id="security">
                                    <label class="form-check-label" for="security">
                                        <i class="fa-solid fa-shield text-main"></i> أمان
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="24hours" id="24hours">
                                    <label class="form-check-label" for="24hours">
                                        <i class="fa-solid fa-clock text-main"></i> خدمة 24 ساعة
                                    </label>
                                </div>
                            </div>


                            <h6 class="small mt-2">مميزات قد تفيد المطاعم والمقاهي</h6>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="coldDrinks" id="coldDrinks">
                                    <label class="form-check-label" for="coldDrinks">
                                        <i class="fa-solid fa-wine-glass text-main"></i> العصائر
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="hotDrinks" id="hotDrinks">
                                    <label class="form-check-label" for="hotDrinks">
                                        <i class="fa-solid fa-mug-hot text-main"></i> المشروبات الساخنة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="sweets" id="sweets">
                                    <label class="form-check-label" for="sweets">
                                        <i class="fa-solid fa-cheese text-main"></i> الحلويات
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="sweets" id="sweets">
                                    <label class="form-check-label" for="sweets">
                                        <i class="fa-solid fa-bag-shopping text-main"></i> تيك اواى
                                    </label>
                                </div>
                            </div>
                            



                            <h6 class="small mt-2">مميزات قد تفيد الفنادق</h6>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="familyRoom" id="familyRoom">
                                    <label class="form-check-label" for="familyRoom">
                                        <i class="fa-solid fa-people-group text-main"></i> غرف عائلية
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="doubleRoom" id="doubleRoom">
                                    <label class="form-check-label" for="doubleRoom">
                                        <i class="fa-solid fa-people-arrows text-main"></i> غرف مزدوجة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="safeCase" id="safeCase">
                                    <label class="form-check-label" for="safeCase">
                                        <i class="fa-solid fa-vault text-main"></i> خزينة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="bathroom" id="bathroom">
                                    <label class="form-check-label" for="bathroom">
                                        <i class="fa-solid fa-bath text-main"></i> حمام بالغرف
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="roomsClean" id="roomsClean">
                                    <label class="form-check-label" for="roomsClean">
                                        <i class="fa-solid fa-broom text-main"></i> تنظيف الغرف
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="clothesClean" id="clothesClean">
                                    <label class="form-check-label" for="clothesClean">
                                        <i class="fa-solid fa-shirt text-main"></i> تنظيف الملابس
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="meals" id="meals">
                                    <label class="form-check-label" for="meals">
                                        <i class="fa-solid fa-utensils text-main"></i> وجبات
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="bar" id="bar">
                                    <label class="form-check-label" for="bar">
                                        <i class="fa-solid fa-martini-glass text-main"></i> بار مشروبات
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="iron" id="iron">
                                    <label class="form-check-label d-flex align-items-center" for="iron">
                                        <img src="{{asset('assets/images/icons/iron.png')}}" width="19px" alt="">
                                        <span>مكواه ملابس</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="meetingRoom" id="meetingRoom">
                                    <label class="form-check-label" for="meetingRoom">
                                        <i class="fa-solid fa-people-line text-main"></i> قاعة اجتماعات
                                    </label>
                                </div>
                            </div>


                            <h6 class="small mt-2">مميزات قد تفيد الملاهي والترفيه</h6>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="kidsSwing" id="kidsSwing">
                                    <label class="form-check-label d-flex align-items-center" for="kidsSwing">
                                        <img src="{{asset('assets/images/icons/swing.png')}}" width="16" alt="kids area icon">
                                        <span>ملاهي أطفال</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="gamesPark" id="gamesPark">
                                    <label class="form-check-label d-flex align-items-center" for="gamesPark">
                                        <img src="{{asset('assets/images/icons/park.png')}}" width="16" alt="kids area icon">
                                        <span>ملاهي للكبار</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="resturant" id="resturant">
                                    <label class="form-check-label" for="resturant">
                                        <i class="fa-solid fa-utensils text-main"></i> المطاعم
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="cafe" id="cafe">
                                    <label class="form-check-label" for="cafe">
                                        <i class="fa-solid fa-mug-hot text-main"></i> المقاهي
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="ski" id="ski">
                                    <label class="form-check-label" for="ski">
                                        <i class="fa-solid fa-person-skiing-nordic text-main"></i> التزحلق على الجليد
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="bowling" id="bowling">
                                    <label class="form-check-label" for="bowling">
                                        <i class="fa-solid fa-bowling-ball text-main"></i> صالات بولينج
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="padel" id="padel">
                                    <label class="form-check-label" for="padel">
                                        <i class="fa-solid fa-baseball text-main"></i> ملاعب بادل
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="carsRace" id="carsRace">
                                    <label class="form-check-label d-flex align-items-center" for="carsRace">
                                        <img src="{{asset('assets/images/icons/helmet.png')}}" width="16" alt="car helmet icon">
                                        <span>مضمار سيارات</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="theater" id="theater">
                                    <label class="form-check-label d-flex align-items-center" for="theater">
                                        <img src="{{asset('assets/images/icons/curtains.png')}}" width="16" alt="theater icon">
                                        <span>عروض مسرحية</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="publicArea" id="publicArea">
                                    <label class="form-check-label d-flex align-items-center" for="publicArea">
                                        <img src="{{asset('assets/images/icons/bench.png')}}" width="16" alt="public area icon">
                                        <span>جلسات عامة</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="freeEntry" id="freeEntry">
                                    <label class="form-check-label d-flex align-items-center" for="freeEntry">
                                        <img src="{{asset('assets/images/icons/ticket.png')}}" width="16" alt="free icon">
                                        <span>دخول مجاني</span>
                                    </label>
                                </div>
                            </div>


                            <h6 class="small mt-2">مميزات قد تفيد التسوق</h6>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="foods" id="foods">
                                    <label class="form-check-label" for="foods">
                                        <i class="fa-solid fa-utensils text-main"></i> الطعام
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="vegitables" id="vegitables">
                                    <label class="form-check-label" for="vegitables">
                                        <i class="fa-solid fa-carrot text-main"></i> الخضراوات والفاكهة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="homeparts" id="homeparts">
                                    <label class="form-check-label" for="homeparts">
                                        <i class="fa-solid fa-house text-main"></i> المنزل والمعيشة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="kichenMachiens" id="kichenMachiens">
                                    <label class="form-check-label" for="kichenMachiens">
                                        <i class="fa-solid fa-kitchen-set text-main"></i> المطبخ
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="clothesShoes" id="clothesShoes">
                                    <label class="form-check-label" for="clothesShoes">
                                        <i class="fa-solid fa-shirt text-main"></i> الملابس والأحذية
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="electronics" id="electronics">
                                    <label class="form-check-label" for="electronics">
                                        <i class="fa-solid fa-laptop text-main"></i> الإلكترونيات
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="kidsCare" id="kidsCare">
                                    <label class="form-check-label d-flex align-items-center" for="kidsCare">
                                        <img src="{{asset('assets/images/icons/child.png')}}" width="19" alt="mother kids icon">
                                        <span>عناية الأم والطفل</span>
                                    </label>
                                </div>
                            </div>


                            <h6 class="small mt-2">مميزات قد تفيد الطب</h6>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="watingTime" id="watingTime">
                                    <label class="form-check-label" for="watingTime">
                                        <i class="fa-solid fa-stopwatch text-main"></i> مدة انتظار قليلة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="goodListner" id="goodListner">
                                    <label class="form-check-label" for="goodListner">
                                        <i class="fa-solid fa-ear-listen text-main"></i> مستمع جيد
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="manyDepartments" id="manyDepartments">
                                    <label class="form-check-label" for="manyDepartments">
                                        <i class="fa-solid fa-stethoscope text-main"></i> متعدد التخصصات
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="cleanPlace" id="cleanPlace">
                                    <label class="form-check-label" for="cleanPlace">
                                        <i class="fa-solid fa-pump-soap text-main"></i> النظافة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="smartDevices" id="smartDevices">
                                    <label class="form-check-label" for="smartDevices">
                                        <i class="fa-solid fa-tachograph-digital text-main"></i> أجهزة حديثة
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="avaliable" id="avaliable">
                                    <label class="form-check-label" for="avaliable">
                                        <i class="fa-solid fa-calendar-check text-main"></i> متاح يومياً
                                    </label>
                                </div>
                            </div>



                            <h6 class="small mt-2">مميزات قد تفيد المساجد</h6>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="womanMosque" id="womanMosque">
                                    <label class="form-check-label d-flex align-items-center" for="womanMosque">
                                        <img src="{{asset('assets/images/icons/hijab.png')}}" width="16" alt="mulim woman icon">
                                        <span>مصلي سيدات</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="quraan" id="quran">
                                    <label class="form-check-label d-flex align-items-center" for="quran">
                                        <img src="{{asset('assets/images/icons/quran.png')}}" width="16" alt="quran icon">
                                        <span>تحفيظ قرآن</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <a href="" type="submit" class="main-btn w-25 my-3 p-1"><i class="fa-solid fa-floppy-disk"></i>  حفظ</a>    
                            </div>
                        </div>
                    </form>  
                  </div>
              </div>
          </div>    
      </div>
    </div>

    </x-dashboard.layout>
    