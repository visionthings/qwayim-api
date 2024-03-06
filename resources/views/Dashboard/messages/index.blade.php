<x-dashboard.layout title="الرسائل">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/messages.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">الرسائل <small>الكل</small></h2>
    @endsection
    <form action="{{ URL::current() }}" method="GET" class="d-flex align-items-center justify-content-between">
        <button type="submit" class="{{ Request::get('user_id') == null ? 'main-btn active' : 'light-btn' }} w-25" @if(Request::get('user_id') == null) disabled @endif>الكل</button>
        <button class="{{ Request::get('user_id') == 'subscriper' ? 'main-btn active' : 'light-btn' }} w-25" type="submit" name="user_id" value="subscriper" @if(Request::get('user_id') == 'subscriper') disabled @endif>المشتركين</button>
        <button class="{{ Request::get('user_id') == 'not_subscriper' ? 'main-btn active' : 'light-btn' }} w-25" type="submit" name="user_id" value="not_subscriper" @if(Request::get('user_id') == 'not_subscriper') disabled @endif>الغير مشتركين</button>
    </form>
    
    {{-- <ul class="d-flex justify-content-center mt-2">
        <li><a href="{{ url('/messages') }}" class="main-btn mx-2">الكل</a></li>
        <li><a href="{{ url('/messages/subscribers') }}" class="light-btn mx-2">المشتركين</a></li>
        <li><a href="{{ url('/messages/Non-subscribers') }}" class="light-btn mx-2">غير مشتركين</a></li>
    </ul> --}}


    <div class="container">
        <div class="messages">
            @forelse ($userMessages as $message)
               <div style="background-color: silver;">
                @if($message->user) 
                    <span>الاسم : {{$message->user->name}}</span>
                @endif
                <p>الرساله : {{$message->message}}</p>
                @if($message->status==='read')
                <strong style="color: red;">مقرؤه</strong>
                @else
                        <form action="{{route('messages.update',$message->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">read</button>
                        </form>
                @endif
               </div>
              <br>
            @empty
                <p class="bold text-center">لا يوجد رسائل</p>
            @endforelse 
            {{-- <div class="message p-3 rounded-3">
                <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="{{asset('assets/images/person.png')}}" width="50" height="50" class="rounded-circle shadow" alt="">
                            <div class="ms-2">
                                <h6 class="m-0 bold">
                                    {{$message->user->name}}
                                </h6>
                                    @if($message->user->online)
                                        <span class="small text-main">متصل الان</span>
                                    @else
                                        <span class="small text-red">غير متصل الان</span>
                                    @endif
                            </div> 
                            
                        </div> --}}

{{-- 
                    @foreach ($user->messages as $message)
                        
                    <div>
                        @if($message->status ==='pending')
                        <form action="{{route('messages.update',$message->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="text-main mx-1"><i class="fa-solid fa-check-double fa-lg"></i></button>
                        </form>
                        @endif
                        <a role="button" onClick="showMessagePop()" class="text-red mx-1"><i class="fa-solid fa-trash-can fa-lg"></i></a>
                        <a href="" class="text-main mx-1"><i class="fa-solid fa-eye fa-lg"></i></a>
                    </div>
                </div>
                <div class="w-100 mx-auto shadow px-2 py-3 rounded-2 mt-2 bg-light">
                    <p class="m-0">
                        {{$message->message}}
                    </p>
                </div>
                @endforeach --}}
            </div>
            
           
            
            
            
        </div>    
    </div>
    
    </x-dashboard.layout>
    