@error('city_id')
    <p>{{$message}}</p>
@enderror
@error('images')
    <p>{{$message}}</p>
@enderror
@error('name')
    <p>{{$message}}</p>
@enderror
@error('category_id')
    <p>{{$message}}</p>
@enderror
@error('google_map')
    <p>{{$message}}</p>
@enderror
@error('description')
    <p>{{$message}}</p>
@enderror
@error('nearest_airport')
    <p>{{$message}}</p>
@enderror
@error('distance')
    <p>{{$message}}</p>
@enderror
@error('phone')
    <p>{{$message}}</p>
@enderror
@error('email')
    <p>{{$message}}</p>
@enderror
@error('website')
    <p>{{$message}}</p>
@enderror
@error('facebook')
    <p>{{$message}}</p>
@enderror
@error('instagram')
    <p>{{$message}}</p>
@enderror
@error('snapchat')
    <p>{{$message}}</p>
@enderror
<div class="row">
    <h6>البيانات الأساسية</h6>
    <div class="col-md-6 mb-2">
        <label for="city">المدينة</label>
        <select name="city_id" id="city_id" class="form-control form-select">
            <option value="{{$city->id}}" @if(old('city_id',$city->id ?? '') ==$city->id ) selected @endif>{{$city->name}}</option>
        </select>
    </div>

    <div class="col-md-6 mb-2">
        <label for="category_id">القسم</label>
        <select name="category_id" id="category_id" class="form-control form-select">
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @if(old('category_id',$place->category_id ?? '')) selected @endif()>
                    {{$category->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-2">
        <label for="name">إسم الواجهة</label>
        <input type="text" name="name"  id="name" value="{{old('name',$place->name ?? '')}}" class="form-control" placeholder="الاسم">
    </div>
    <div class="col-md-6 mb-2">
        <label for="google_map">رابط لوكيشن جوجل ماب</label>
        <input type="text" name="google_map" id="google_map" value="{{old('google_map',$place->google_map ?? '')}}" class="form-control" placeholder="Google Maps link">
    </div>
    <div class="col-md-6 mb-2">
        <label for="address">العنوان</label>
        <input type="text" name="address" id="address" value="{{old('address',$place->address ?? '')}}" class="form-control" placeholder="العنوان">
    </div>
    <h6>بيانات إضافية</h6>
    <div class="col-md-6 mb-2">
        <label for="description	">وصف الواجهة</label>
        <textarea name="description" id="description" class="form-control" placeholder="الوصف">{{old('description',$place->description ?? '')}}</textarea>
    </div>

    <div class="col-md-6 mb-2">
        <label for="images">صور خاصة بالواجهة</label>
        <input type="file" name="images[]" id="images" class="form-control" accept="images/*" multiple>
    </div>
    <div class="col-md-6 mb-2">
        <label for="nearest_airport">أقرب مطار</label>
        <input type="text" name="nearest_airport" value="{{old('nearest_airport',$place->nearest_airport ?? '')}}" id="nearest_airport" class="form-control" placeholder="أقرب مطار">
    </div>
    <div class="col-md-6 mb-2">
        <label for="distance">يبعد عن الموقع مسافة</label>
        <input type="text" id="distance" name="distance" class="form-control" value="{{old('distance',$place->distance ?? '')}}" placeholder="ادخل المسافة (كم)">
    </div>

    <h6>طرق الوصول للمدينة</h6>
    <div class="col-md-12 mb-2">
        <label for="reach_by_plane">الوصول بالطائرة</label>
        <textarea id="reach_by_plane" name="reach_by_plane" class="form-control" placeholder="طريقة الوصول للمدينة بالطائرة">{{old('reach_by_plane',$city->reach_by_plane ?? '')}}</textarea>
    </div>
    <div class="col-md-12 mb-2">
        <label for="reach_by_train">الوصول بالقطار</label>
        <textarea id="reach_by_train" name="reach_by_train" class="form-control" placeholder="طريقة الوصول للمدينة بالقطار">{{old('reach_by_train',$city->reach_by_train ?? '')}}</textarea>
    </div>
    <div class="col-md-12 mb-2">
        <label for="reach_by_car">الوصول بالسيارة</label>
        <textarea id="reach_by_car" name="reach_by_car" class="form-control" placeholder="طريقة الوصول للمدينة بالسيارة">{{old('reach_by_car',$city->reach_by_car ?? '')}}</textarea>
    </div>
    <div class="col-md-12 mb-2">
        <label for="reach_by_public_transport">الوصول بوسائل النقل العامة</label>
        <textarea id="reach_by_public_transport" name="reach_by_public_transport" class="form-control" placeholder="طريقة الوصول للمدينة بوسائل النقل العامة">{{old('reach_by_public_transport',$city->reach_by_public_transport ?? '')}}</textarea>
    </div>
















    <h6>بيانات التواصل</h6>
    <div class="col-lg-4 col-md-6 mb-2">
        <label for="phone">رقم الهاتف</label>
        <input type="tel" id="phone" name="phone" value="{{old('phone',$place->contact->phone ?? '')}}" class="form-control" placeholder="الهاتف">
    </div>
    <div class="col-lg-4 col-md-6 mb-2">
        <label for="email">البريد الإلكتروني</label>
        <input type="email" id="email" name="email" value="{{old('email',$place->contact->email ?? '')}}" class="form-control" placeholder="البريد">
    </div>
    <div class="col-lg-4 col-md-6 mb-2">
        <label for="website">الموقع الإلكتروني</label>
        <input type="text" id="website" name="website" value="{{old('website',$place->contact->website ?? '')}}" class="form-control" placeholder="الموقع الإلكتروني">
    </div>
    <div class="col-lg-4 col-md-6 mb-2">
        <label for="facebook">رابط فيس بوك</label>
        <input type="text" id="facebook" name="facebook" value="{{old('facebook',$place->contact->facebook ?? '')}}" class="form-control" placeholder="فيس بوك">
    </div>
    <div class="col-lg-4 col-md-6 mb-2">
        <label for="instagram">رابط إنسجرام</label>
        <input type="text" id="instagram"name="instagram" value="{{old('instagram',$place->contact->instagram ?? '')}}" class="form-control" placeholder="إنستجرام">
    </div>
    <div class="col-lg-4 col-md-6 mb-2">
        <label for="snapchat">رابط سناب شات</label>
        <input type="text" id="snapchat" name="snapchat" value="{{old('snapchat',$place->contact->snapchat ?? '')}}" class="form-control" placeholder="سناب شات">
    </div>



    <h6 class="bold">المميزات</h6>
    <h6 class="small">مميزات عامة</h6>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="wifi" {{ in_array('wifi', old('features', $place->feature->features ?? [])) ? 'checked' : '' }} id="wifi">
            <label class="form-check-label" for="wifi">
                <i class="fa-solid fa-wifi text-main"></i> الواى فاى
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]"  type="checkbox" value="garage" {{ in_array('garage', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="garage">
            <label class="form-check-label" for="garage">
                <i class="fa-solid fa-car text-main"></i> جراج سيارات
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="cash" {{ in_array('cash', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="cash">
            <label class="form-check-label" for="cash">
                <i class="fa-solid fa-money-bill text-main"></i> الدفع كاش
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="visa" {{ in_array('visa', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="visa">
            <label class="form-check-label" for="visa">
                <i class="fa-brands fa-cc-visa text-main"></i> الدفع بالطاقة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="aircondetion" {{ in_array('aircondetion', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="aircondetion">
            <label class="form-check-label" for="aircondetion">
                <i class="fa-solid fa-snowflake text-main"></i> تكييف
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="wheelChair" {{ in_array('wheelChair', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="wheelChair">
            <label class="form-check-label" for="wheelChair">
                <i class="fa-solid fa-wheelchair text-main"></i> كراسي متحركة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="kidsArea" {{ in_array('kidsArea', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="kidsArea">
            <label class="form-check-label" for="kidsArea">
                <i class="fa-solid fa-children text-main"></i> ألعاب أطفال
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="TV" {{ in_array('TV', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="TV">
            <label class="form-check-label" for="TV">
                <i class="fa-solid fa-tv text-main"></i> تلفاز
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="security" {{ in_array('security', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="security">
            <label class="form-check-label" for="security">
                <i class="fa-solid fa-shield text-main"></i> أمان
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="24hours" {{ in_array('24hours', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="24hours">
            <label class="form-check-label" for="24hours">
                <i class="fa-solid fa-clock text-main"></i> خدمة 24 ساعة
            </label>
        </div>
    </div>


    <h6 class="small mt-2">مميزات قد تفيد المطاعم والمقاهي</h6>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="coldDrinks" {{ in_array('coldDrinks', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }}  id="coldDrinks">
            <label class="form-check-label" for="coldDrinks">
                <i class="fa-solid fa-wine-glass text-main"></i> العصائر
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="hotDrinks" {{ in_array('hotDrinks', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="hotDrinks">
            <label class="form-check-label" for="hotDrinks">
                <i class="fa-solid fa-mug-hot text-main"></i> المشروبات الساخنة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]"  type="checkbox" value="sweets" {{ in_array('sweets', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="sweets">
            <label class="form-check-label" for="sweets">
                <i class="fa-solid fa-cheese text-main"></i> الحلويات
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="takeaway"  {{ in_array('takeaway', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="sweets">
            <label class="form-check-label" for="sweets">
                <i class="fa-solid fa-bag-shopping text-main"></i> تيك اواى
            </label>
        </div>
    </div>




    <h6 class="small mt-2">مميزات قد تفيد الفنادق</h6>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="familyRoom" {{ in_array('familyRoom', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="familyRoom">
            <label class="form-check-label" for="familyRoom">
                <i class="fa-solid fa-people-group text-main"></i> غرف عائلية
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input"  name="features[]" type="checkbox" value="doubleRoom" {{ in_array('doubleRoom', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="doubleRoom">
            <label class="form-check-label" for="doubleRoom">
                <i class="fa-solid fa-people-arrows text-main"></i> غرف مزدوجة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="safeCase" {{ in_array('safeCase', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="safeCase">
            <label class="form-check-label" for="safeCase">
                <i class="fa-solid fa-vault text-main"></i> خزينة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="bathroom" {{ in_array('bathroom', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="bathroom">
            <label class="form-check-label" for="bathroom">
                <i class="fa-solid fa-bath text-main"></i> حمام بالغرف
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="roomsClean" {{ in_array('roomsClean', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="roomsClean">
            <label class="form-check-label" for="roomsClean">
                <i class="fa-solid fa-broom text-main"></i> تنظيف الغرف
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="clothesClean" {{ in_array('clothesClean', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="clothesClean">
            <label class="form-check-label" for="clothesClean">
                <i class="fa-solid fa-shirt text-main"></i> تنظيف الملابس
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="meals" {{ in_array('meals', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="meals">
            <label class="form-check-label" for="meals">
                <i class="fa-solid fa-utensils text-main"></i> وجبات
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="bar" {{ in_array('bar', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="bar">
            <label class="form-check-label" for="bar">
                <i class="fa-solid fa-martini-glass text-main"></i> بار مشروبات
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="iron" {{ in_array('iron', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="iron">
            <label class="form-check-label d-flex align-items-center" for="iron">
                <img src="{{asset('assets/images/icons/iron.png')}}" width="19px" alt="">
                <span>مكواه ملابس</span>
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="meetingRoom" {{ in_array('meetingRoom', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="meetingRoom">
            <label class="form-check-label" for="meetingRoom">
                <i class="fa-solid fa-people-line text-main"></i> قاعة اجتماعات
            </label>
        </div>
    </div>


    <h6 class="small mt-2">مميزات قد تفيد الملاهي والترفيه</h6>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]"  type="checkbox" value="kidsSwing" {{ in_array('kidsSwing', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="kidsSwing">
            <label class="form-check-label d-flex align-items-center" for="kidsSwing">
                <img src="{{asset('assets/images/icons/swing.png')}}" width="16" alt="kids area icon">
                <span>ملاهي أطفال</span>
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="gamesPark" {{ in_array('gamesPark', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="gamesPark">
            <label class="form-check-label d-flex align-items-center" for="gamesPark">
                <img src="{{asset('assets/images/icons/park.png')}}" width="16" alt="kids area icon">
                <span>ملاهي للكبار</span>
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="resturant" {{ in_array('resturant', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="resturant">
            <label class="form-check-label" for="resturant">
                <i class="fa-solid fa-utensils text-main"></i> المطاعم
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input"  name="features[]" type="checkbox" value="cafe" {{ in_array('cafe', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="cafe">
            <label class="form-check-label" for="cafe">
                <i class="fa-solid fa-mug-hot text-main"></i> المقاهي
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="ski"  {{ in_array('ski', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="ski">
            <label class="form-check-label" for="ski">
                <i class="fa-solid fa-person-skiing-nordic text-main"></i> التزحلق على الجليد
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="bowling" {{ in_array('bowling', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="bowling">
            <label class="form-check-label" for="bowling">
                <i class="fa-solid fa-bowling-ball text-main"></i> صالات بولينج
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="padel" {{ in_array('padel', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="padel">
            <label class="form-check-label" for="padel">
                <i class="fa-solid fa-baseball text-main"></i> ملاعب بادل
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="carsRace" {{ in_array('carsRace', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="carsRace">
            <label class="form-check-label d-flex align-items-center" for="carsRace">
                <img src="{{asset('assets/images/icons/helmet.png')}}" width="16" alt="car helmet icon">
                <span>مضمار سيارات</span>
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="theater" {{ in_array('theater', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="theater">
            <label class="form-check-label d-flex align-items-center" for="theater">
                <img src="{{asset('assets/images/icons/curtains.png')}}" width="16" alt="theater icon">
                <span>عروض مسرحية</span>
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="publicArea" {{ in_array('publicArea', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="publicArea">
            <label class="form-check-label d-flex align-items-center" for="publicArea">
                <img src="{{asset('assets/images/icons/bench.png')}}" width="16" alt="public area icon">
                <span>جلسات عامة</span>
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="freeEntry" {{ in_array('freeEntry', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="freeEntry">
            <label class="form-check-label d-flex align-items-center" for="freeEntry">
                <img src="{{asset('assets/images/icons/ticket.png')}}" width="16" alt="free icon">
                <span>دخول مجاني</span>
            </label>
        </div>
    </div>


    <h6 class="small mt-2">مميزات قد تفيد التسوق</h6>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="foods" {{ in_array('foods', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="foods">
            <label class="form-check-label" for="foods">
                <i class="fa-solid fa-utensils text-main"></i> الطعام
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="vegitables" {{ in_array('vegitables', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="vegitables">
            <label class="form-check-label" for="vegitables">
                <i class="fa-solid fa-carrot text-main"></i> الخضراوات والفاكهة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="homeparts"  {{ in_array('homeparts', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="homeparts">
            <label class="form-check-label" for="homeparts">
                <i class="fa-solid fa-house text-main"></i> المنزل والمعيشة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="kichenMachiens" {{ in_array('kichenMachiens', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="kichenMachiens">
            <label class="form-check-label" for="kichenMachiens">
                <i class="fa-solid fa-kitchen-set text-main"></i> المطبخ
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="clothesShoes" {{ in_array('cash', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="clothesShoes">
            <label class="form-check-label" for="clothesShoes">
                <i class="fa-solid fa-shirt text-main"></i> الملابس والأحذية
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]"  type="checkbox" value="electronics" {{ in_array('cash', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="electronics">
            <label class="form-check-label" for="electronics">
                <i class="fa-solid fa-laptop text-main"></i> الإلكترونيات
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="kidsCare" {{ in_array('kidsCare', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="kidsCare">
            <label class="form-check-label d-flex align-items-center" for="kidsCare">
                <img src="{{asset('assets/images/icons/child.png')}}" width="19" alt="mother kids icon">
                <span>عناية الأم والطفل</span>
            </label>
        </div>
    </div>


    <h6 class="small mt-2">مميزات قد تفيد الطب</h6>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="watingTime" {{ in_array('watingTime', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="watingTime">
            <label class="form-check-label" for="watingTime">
                <i class="fa-solid fa-stopwatch text-main"></i> مدة انتظار قليلة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="goodListner" {{ in_array('goodListner', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="goodListner">
            <label class="form-check-label" for="goodListner">
                <i class="fa-solid fa-ear-listen text-main"></i> مستمع جيد
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="manyDepartments" {{ in_array('manyDepartments', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="manyDepartments">
            <label class="form-check-label" for="manyDepartments">
                <i class="fa-solid fa-stethoscope text-main"></i> متعدد التخصصات
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="cleanPlace" {{ in_array('cleanPlace', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="cleanPlace">
            <label class="form-check-label" for="cleanPlace">
                <i class="fa-solid fa-pump-soap text-main"></i> النظافة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="smartDevices" {{ in_array('smartDevices', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="smartDevices">
            <label class="form-check-label" for="smartDevices">
                <i class="fa-solid fa-tachograph-digital text-main"></i> أجهزة حديثة
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="avaliable" {{ in_array('avaliable', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="avaliable">
            <label class="form-check-label" for="avaliable">
                <i class="fa-solid fa-calendar-check text-main"></i> متاح يومياً
            </label>
        </div>
    </div>



    <h6 class="small mt-2">مميزات قد تفيد المساجد</h6>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="womanMosque" {{ in_array('womanMosque', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }}  id="womanMosque">
            <label class="form-check-label d-flex align-items-center" for="womanMosque">
                <img src="{{asset('assets/images/icons/hijab.png')}}" width="16" alt="mulim woman icon">
                <span>مصلي سيدات</span>
            </label>
        </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
        <div class="form-check">
            <input class="form-check-input" name="features[]" type="checkbox" value="quraan" {{ in_array('quraan', old('features', $place->feature->featuers ?? [])) ? 'checked' : '' }} id="quran">
            <label class="form-check-label d-flex align-items-center" for="quran">
                <img src="{{asset('assets/images/icons/quran.png')}}" width="16" alt="quran icon">
                <span>تحفيظ قرآن</span>
            </label>
        </div>
    </div>

    <div class="col-12 mb-2">
        <button type="submit" class="main-btn w-25 my-3 p-1"><i class="fa-solid fa-floppy-disk"></i>  حفظ</button>
    </div>
</div>
