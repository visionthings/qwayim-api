<div class="container-fluid">
    @error('name')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    @error('email')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    @error('phone')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    @error('password')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    @error('job_name')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    @error('job_descripation')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <div class="row">
        @if ($admin->getFirstMediaUrl('admin'))
            <div>
                <img style="width: 200px; height:200px; object-fit:cover;" src="{{$admin->getFirstMediaUrl('admin')}}">
            </div>
        @endif
        <div class="col-md-6 mb-2">
            <label for="avatar">الصورة</label>
            <input type="file" name="avatar" id="avatar"  class="form-control">
        </div>
        <div class="col-md-6 mb-2">
            <label for="name">الإسم</label>
            <input type="text" name="name" id="name" value="{{old('name',$admin->name)}}" class="form-control" placeholder="الإسم">
        </div>
        <div class="col-md-6 mb-2">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" value="{{old('email',$admin->email)}}" class="form-control" placeholder="admin@qwaem.com">
        </div>
        <div class="col-md-6 mb-2">
            <label for="phone">رقم الهاتف</label>
            <input type="text" name="phone" id="phone" value="{{old('phone',$admin->phone)}}" class="form-control" placeholder="الرقم برمز الدولة">
        </div>
        <div class="col-md-6 mb-2">
            <label for="password">كلمة السر</label>
            <input type="password" name="password"  id="password" class="form-control" placeholder="كلمة سر قوية">
        </div>
        <div class="col-md-6 mb-2">
            <label for="job_name">المسمي الوظيفي</label>
            <input type="text" name="job_name" value="{{old('job_name',$admin->job_name)}}" id="job_name" class="form-control" placeholder="...،مدير،محرر،ناشر">
        </div>
        <div class="col-md-6 mb-2">
            <label for="job_descripation">وصف الوظيفة</label>
            <input type="text" name="job_descripation" value="{{old('job_descripation',$admin->job_descripation)}}" id="job_descripation" class="form-control" placeholder=" ...،محلل،مرسل">
        </div>
        @if ($admin->permissions->count())
            
        <h6 class="bold mt-1">الصلاحيات الحالية</h6>
            @foreach ($admin->permissions as $permission)
                <p style="color: red;">{{$permission->name}}</p>
            @endforeach
        @endif
        <hr>
        <h6 class="bold mt-1">الصلاحيات</h6>
        @foreach ($permissions as $permission)
            
        <div class="col-md-4 col-sm-6">
            <div class="form-check">
                <input class="form-check-input"  name="permission[]" type="checkbox" value="{{$permission->name}}" id="{{$permission->name}}">
                <label class="form-check-label" for="{{$permission->name}}">
                        {{$permission->name}}
                </label>
            </div>
        </div>
        @endforeach
      
        <div class="col-12 mb-2">
            <button type="submit" class="main-btn w-25 my-3 p-1">
                <i class="fa-solid fa-floppy-disk"></i>  
                {{$btn_text}}
            </button>    
        </div>
    </div>
</div>