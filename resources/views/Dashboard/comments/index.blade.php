<x-dashboard.layout title="التعليقات">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/comments.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">التعليقات</h2>
    @endsection
    
    <div class="container-fluid mt-3">
        <form action="{{URL::current()}}" method="GET" class="w-100">

            <div class="row w-100 align-items-center">
                <div class="col-md-1 col-2 mb-2">
                    <label for="city">المدينة</label>
                </div>
                <div class="col-md-2 col-4 mb-2">
                    <select name="city_id" id="city" class="form-control form-select">
                        <option value="" selected>...</option>
                        @foreach ($cities as $city )
                            <option value="{{$city->id}}" @if(request('city_id')==$city->id) selected @endif>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1 col-2 mb-2">
                    <label for="category">القسم</label>
                </div>
                <div class="col-md-2 col-4 mb-2">
                    <select name="category_id" id="category" class="form-control form-select">
                        <option value="" selected>...</option>
                        @foreach ($categories as $categoty)
                            <option value="{{$categoty->id}}" @if(request('category_id')==$categoty->id) selected @endif>{{$categoty->name}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="col-md-1 col-2 mb-2">
                    <label for="category">الواجهة</label>
                </div>
                <div class="col-md-2 col-10 mb-2">
                    <select name="place_id" id="category" class="form-control form-select">
                        <option value="" selected>...</option>
                        
                        @foreach ($places as $place)
                            <option value="{{$place->id}}" @if(request('place_id')==$place->id) selected @endif>{{$place->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <button type="submit" class="main-btn p-1 w-100 d-block">البحث</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="shadow rounded-3 p-3 comment">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="bold">أحدث التعليقات</h6>
                        <h6 class="small">الأحدث <i class="fa-solid fa-chevron-up"></i></h6>
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
                            @foreach ($palcesComments as $comments)
                            @forelse ($comments->comments as $comment)
                                
                                <tr>
                                    <td class="bold">1-</td>
                                    <td><img src="{{asset('assets/images/person.png')}}" width="30" height="30" class="rounded-circle"></td>
                                    <td>
                                        <h6 class="bold small m-0">
                                            {{$comment->user->name}}
                                        </h6>
                                        <span class="small text-muted">
                                            {{$comment->user->email}}    
                                        </span>
                                    </td>
                                    <td>
                                        <p class="comment">
                                            {{$comment->content}}
                                        </p>
                                    </td>
                                    <td>
                                        {{$comment->place->category->name}}
                                    </td>
                                    <td>
                                        {{$comment->place->name}}
                                    </td>
                                    <td>
                                        {{$comment->created_at->format('Y-m-d')}}

                                    </td>
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
                                            <li>
                                                <form action="{{route('comments.destroy',$comment->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        مسح التعليق    
                                                    </button>
                                                </form>
                                            </li>
                                            <li><a class="dropdown-item" href="#">حظر المستحدم</a></li>
                                            <li class="bg-red"><a class="dropdown-item text-light" href="#" role="button" onclick="showUserPop()">مسح المستخدم</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    
                                </tr>
                                
                            @empty
                                <tr>
                                    <td colspan="9"></td>
                                </tr> 
                            @endforelse
                            {{-- @empty
                                    <tr>
                                        <td colspan="9"></td>
                                    </tr> --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>    
        </div>    
    </div>
    </x-dashboard.layout>
    