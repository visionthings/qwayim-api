<x-dashboard.layout title="الإعدادات والتحكم | الاشعارات">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/settings.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الإعدادت والتحكم <small>الإشعارات</small></h2>
    @endsection
    
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-2">
              <ul class="links p-2">
                <li><a href="{{ route('admins.index') }}"><i class="fa-solid fa-user-pen fa-lg text-main me-2"></i>الأدمن</a></li>
                <li class="active"><a href="{{ route('notifications.index') }}"><i class="fa-solid fa-bell fa-lg text-main me-2"></i>الإشعارات</a></li>
                <li><a href="{{ url('/settings/adding') }}"><i class="fa-solid fa-plus fa-xl text-main me-2"></i>إضافة</a></li>
                <li><a href="{{ route('blocks.index') }}"><i class="fa-solid fa-ban fa-xl text-red me-2"></i>الحظر</a></li>
              </ul>
          </div>
            <div class="col-md-10">
                <div class="box notification-settings shadow rounded-3 p-2 pb-4">
                  <h6 class="text-black bold">الإشعارات</h6>
                <form action="{{route('notifications.update',auth('admin')->user()->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid">
                        <div class="row g-3 mb-4">

                            <div class="col-md-6">
                                <div class="notification-box bg-gray p-3 rounded-3 h-100">
                                    <h6 class="bold">الحساب</h6>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="setting_change_not" @if(auth('admin')->user()->setting_change_not) checked @endif value="1" type="checkbox" role="switch" id="adminChanges">
                                        <label for="adminChanges" role="button">إرسال إشعار لي عند قيام أحد الأدمن بتغيير الاعدادات</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="notification-box bg-gray p-3 rounded-3 h-100">
                                    <h6 class="bold">المشتركين</h6>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" name="subscriper_message_not" @if(auth('admin')->user()->subscriper_message_not) checked @endif value="1" type="checkbox" role="switch" id="reciveMessage">
                                        <label for="reciveMessage" role="button">إرسال إشعار لي عند قيام أحد المشتركين بإرسال رسالة</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" name="subscriper_comment_not"  @if(auth('admin')->user()->subscriper_comment_not) checked @endif value="1" type="checkbox" role="switch" id="newComment">
                                        <label for="newComment" role="button">إرسال إشعار لي عند قيام أحد المشتركين بكتابة تعليق</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" name="subscriper_rate_not" @if(auth('admin')->user()->subscriper_rate_not) checked @endif value="1" type="checkbox" role="switch" id="newRate">
                                        <label for="newRate" role="button">إرسال إشعار لي عند قيام أحد المشتركين بعمل تقييم</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" name="subscriper_question_not" @if(auth('admin')->user()->subscriper_question_not) checked @endif value="1" type="checkbox" role="switch" id="newQuestion">
                                        <label for="newQuestion" role="button">إرسال إشعار لي عند قيام أحد المشتركين بكتابة سؤال</label>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="notification-box bg-gray p-3 rounded-3 h-100">
                                    <h6 class="bold">المنصة</h6>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" role="switch" id="newContract">
                                        <label for="newContract" role="button">إشعار بالتعاقدات الجديدة</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" role="switch" id="newThings">
                                        <label for="newThings" role="button">إشعار بالتحديثات</label>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-12 mb-2">
                            <button type="submit" class="main-btn w-25 my-3 p-1"><i class="fa-regular fa-floppy-disk me-2"></i>حفظ التغييرات</button>
                        </div>
                    </div>
                </form>
                </div>
            </div> 
      </div>
    </div>
    </x-dashboard.layout>
    