@error('title')
    <p>{{$message}}</p>
@enderror
@error('description')
    <p>{{$message}}</p>
@enderror
@error('news_images')
    <p>{{$message}}</p>
@enderror


<div class="row">
    <h6>إضافة خبر جديد</h6>
    <div class="col-md-6 mb-2">
        <label for="city">المدينة</label>
        <select name="city_id" id="city_id" class="form-control form-select">
            <option value="{{$city->id}}" @if(old('city_id',$city->id ?? '') ==$city->id ) selected @endif>{{$city->name}}</option>
        </select>
    </div>
    <div class="col-md-6 mb-2">
        <label for="title">عنوان الخبر</label>
        <textarea name="title" id="title" class="form-control" placeholder="أضف عنوان للخبر">{{old('title',$news->title ?? '')}}</textarea>
    </div><div class="col-md-6 mb-2">
        <label for="description	">وصف الخبر</label>
        <textarea name="description" id="description" class="form-control" placeholder="محتوى الخبر">{{old('description',$news->description ?? '')}}</textarea>
    </div>

    <div class="col-md-6 mb-2">
        <label for="news_images">صور الخبر </label>
        <input type="file" name="news_images[]" id="news_images" class="form-control" accept="images/*" multiple>
    </div>



    <div class="col-12 mb-2">
        <button type="submit" class="main-btn w-25 my-3 p-1"><i class="fa-solid fa-floppy-disk"></i>  حفظ</button>
    </div>
</div>
