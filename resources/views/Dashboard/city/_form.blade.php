    @error('name')
        <p>{{$message}}</p>
    @enderror
    @error('google_map')
        <p>{{$message}}</p>
    @enderror
    @error('country_code')
        <p>{{$message}}</p>
    @enderror
    @error('flag_image')
        <p>{{$message}}</p>
    @enderror
    @error('about')
        <p>{{$message}}</p>
    @enderror
    @error('city_images')
        <p>{{$message}}</p>
    @enderror
    @error('city_milestones')
        <p>{{$message}}</p>
    @enderror

<div class="row">
    <h6>بيانات المدينة الرئيسية</h6>
    <div class="col-md-6 mb-2">
        <label for="cityName">اسم المدينة</label>
        <input type="text" id="cityName" name="name" value="{{old('name',$city->name ?? '')}}" class="form-control" placeholder="الإسم">
    </div>
    <div class="col-md-6 mb-2">
        <label for="slug">رابط المدينة</label>
        <input type="text" id="slug" name="slug" value="{{old('name',$city->slug ?? '')}}" class="form-control" placeholder="ادخل اسم المدينة باللغة الإنجليزية">
    </div>
    <div class="col-md-6 mb-2">
        <label for="locationLink">لينك لوكيشن جوجل ماب</label>
        <input type="text" id="locationLink" name="google_map" value="{{old('google_map',$city->google_map ?? '')}}" class="form-control" placeholder="Google Maps Link">
    </div>
    <div class="col-md-6 mb-2">
        <label for="countryName">الدولة التابع لها</label>
        <select id="countryName" name="country_code" class="form-control">
            @foreach ($countries as $country)
            <option value="{{$country}}">{{Country::countryCode($country)}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-2">
        <label for="countryFlag">صورة علم الدولة</label>
        <input type="file" id="countryFlag" name="flag_image" class="form-control" accept="image/*">
    </div>
    <div class="col-md-6 mb-2">
        <label for="city_images">صور المدينة</label>
        <input type="file" id="city_images" name="city_images[]" class="form-control" accept="image/*" multiple>
    </div>
    <div class="col-md-12 mb-2">
        <label for="cityDescription">نبذة عن المدينة</label>
        <textarea type="file" id="cityDescription" name="about" class="form-control" placeholder="الوصف">{{old('about',$city->about ?? '')}}</textarea>
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

    <div class="col-12 mb-2">
        <button type="submit" class="main-btn w-25 my-3 p-1">
            {{$btn_text}}
        </button>
        {{-- <a href="" onclick="getValues()" class="main-btn w-25 my-3 p-1">
            <i class="fa-solid fa-floppy-disk"></i>
             حفظ
        </a>     --}}
    </div>

</div>
