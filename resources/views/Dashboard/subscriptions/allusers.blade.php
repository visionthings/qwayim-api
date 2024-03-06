<x-dashboard.layout title="المتابعين">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/subscriptions.css')}}" />
    @endpush
    @section('navContent')
          <h2 id="navhead" class="h1 mb-0">المشتركين<small>-كل المشتركين</small></h2>
    @endsection

    <div class="row g-3 mb-3">
      <div class="col-md-12">
        <div class="card users shadow rounded-3 p-3 h-100">
            <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                <h6 class="small bold m-0">المشتركين</h6>
                <div class="d-flex align-items-center">
                    <form action="" class="d-flex me-2">
                        <input type="text" placeholder="البحث" class="form-control me-2">
                        <a href="" class="small main-btn p-1 rounded-1"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </form>
                </div>
            </div>
            {{-- عرض 20 ثم 20 واقلب pagination--}}
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
                    <tr>
                        <td>1-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                        <td>القاهرة، مصر</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
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
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>2-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                        <td>القاهرة، مصر</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox2" role="button">
                              <input type="checkbox" id="bookmarkCheckbox2" onchange="toggleBookmark('bookmarkIcon2', this)" hidden>
                              <i id="bookmarkIcon2" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>3-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/tr.png')}}" width="25"></td>
                        <td>اسطنبول،تركيا</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox3" role="button">
                              <input type="checkbox" id="bookmarkCheckbox3" onchange="toggleBookmark('bookmarkIcon3', this)" hidden>
                              <i id="bookmarkIcon3" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>4-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                        <td>القاهرة، مصر</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox4" role="button">
                              <input type="checkbox" id="bookmarkCheckbox4" onchange="toggleBookmark('bookmarkIcon4', this)" hidden>
                              <i id="bookmarkIcon4" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>5-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/sa.png')}}" width="25"></td>
                        <td>جدة، المملكة العربية السعودية</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox5" role="button">
                              <input type="checkbox" id="bookmarkCheckbox5" onchange="toggleBookmark('bookmarkIcon5', this)" hidden>
                              <i id="bookmarkIcon5" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>6-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                        <td>القاهرة، مصر</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox6" role="button">
                              <input type="checkbox" id="bookmarkCheckbox6" onchange="toggleBookmark('bookmarkIcon6', this)" hidden>
                              <i id="bookmarkIcon6" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>7-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                        <td>القاهرة، مصر</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox7" role="button">
                              <input type="checkbox" id="bookmarkCheckbox7" onchange="toggleBookmark('bookmarkIcon7', this)" hidden>
                              <i id="bookmarkIcon7" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>8-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/tr.png')}}" width="25"></td>
                        <td>اسطنبول،تركيا</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox8" role="button">
                              <input type="checkbox" id="bookmarkCheckbox8" onchange="toggleBookmark('bookmarkIcon8', this)" hidden>
                              <i id="bookmarkIcon8" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>9-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/eg.png')}}" width="25"></td>
                        <td>القاهرة، مصر</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox9" role="button">
                              <input type="checkbox" id="bookmarkCheckbox9" onchange="toggleBookmark('bookmarkIcon9', this)" hidden>
                              <i id="bookmarkIcon9" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>10-</td>
                        <td><img src="{{asset('assets/images/person.png')}}" width="35" height="35" class="rounded-circle"></td>
                        <td><h6 class="bold m-0 small">عبدالرحمن محمد</h6><span>abdelrahman@gmail.com</span></td>
                        <td><img src="{{asset('assets/images/sa.png')}}" width="25"></td>
                        <td>جدة، المملكة العربية السعودية</td>
                        <td>10-10-2023</td>
                        <td>#132342</td>
                        <td class="text-main">
                            <label for="bookmarkCheckbox10" role="button">
                              <input type="checkbox" id="bookmarkCheckbox10" onchange="toggleBookmark('bookmarkIcon10', this)" hidden>
                              <i id="bookmarkIcon10" class="fas fa-regular fa-bookmark"></i>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{url('/subscriptions/profile')}}">عرض الملف الشخصي</a></li>
                                  <li><a class="dropdown-item" href="#">حظر</a></li>
                                  <li><a class="dropdown-item" href="#">إرسال رسالة</a></li>
                                </ul>
                              </div>
                        </td>
                        <td class="text-red">
                            <i class="fa-solid fa-trash-can" role="button" onclick="showUserPop()"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>

    </div>
    
    
    </x-dashboard.layout>
    