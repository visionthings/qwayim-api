<x-dashboard.layout title="العناصر المحفوظة">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/comments.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/saved.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">العناصر المحفوظة <small>التعليقات</small></h2>
    @endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <a href="{{route('saveds.index')}}" class="light-btn p-2 d-block">المشتركين</a>
            </div>
            <div class="col-4">
                <a href="{{route('saveds.places.view')}}" class="light-btn p-2 d-block">الواجهات</a>
            </div>
            <div class="col-4">
                <a href="{{route('saveds.comments.view')}}" class="main-btn p-2 d-block">التعليقات</a>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="shadow rounded-3 p-3 comment">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="bold">التعليقات المفضلة</h6>
                        <div class="d-flex">
                            <input type="text" placeholder="البحث" class="form-control me-2">
                            <a href="" class="main-btn p-1 small rounded-1"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </div>
                    </div>
                    <table class="comments w-100">
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>الإسم</td>
                                <td>التعليق</td>
                                <td>القسم</td>
                                <td>الواجهة</td>
                                <td>التاريخ</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>                       
                        {{-- التعليقات من الاحدث للاقدم 20 ثم 20 باستخدام pagination --}}
                        <tbody>
                            @forelse ($favorites as $key => $comment)
                            <tr>
                                <td class="bold">{{$key+1}}-</td>
                                <td><img src="{{$comment->comment->user->getFirstMediaUrl('user')}}" width="30" height="30" class="rounded-circle"></td>
                                <td>
                                    <h6 class="bold small m-0">{{$comment->comment->user->name}}</h6>
                                    <span class="small text-muted">{{$comment->comment->user->email}}</span>
                                </td>
                                <td>
                                    <p class="comment">
                                        {{$comment->comment->content}}
                                    </p>
                                </td>
                                <td>{{$comment->comment->place->category->name}}</td>
                                <td>{{$comment->comment->place->name}}</td>
                                <td>{{$comment->comment->created_at->format('d-m-Y')}}</td>
                                {{-- <td class="text-main">
                                    <label for="bookmarkCheckbox1" role="button">
                                        <input type="checkbox" id="bookmarkCheckbox1" onchange="toggleBookmark('bookmarkIcon1', this)" hidden>
                                        <i id="bookmarkIcon1" class="fas fa-regular fa-bookmark"></i>
                                      </label>
                                </td> --}}
                                <td>
                                    <div class="dropdown">
                                        <span class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical text-main"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                          <li><a class="dropdown-item" href="{{route('subscriper.profile',$comment->comment->user->id)}}">عرض الملف الشخصي</a></li>
                                          <li><a class="dropdown-item" href="#">مسح التعليق</a></li>
                                          <li><a class="dropdown-item" href="#">حظر المستحدم</a></li>
                                          <li class="bg-red"><a class="dropdown-item text-light" role="button" onclick="showUserPop()">مسح المستخدم</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            
                            @empty
                                <tr>
                                    <td colspan="9" class="py-2 text-center rounded-3 bold">لا يوجد بيانات</td>
                                </tr>
                            @endforelse
                           
                     

                        </tbody>
                    </table>
                </div>
            </div>    
        </div>    
    </div>

    </x-dashboard.layout>
    