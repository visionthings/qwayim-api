<x-dashboard.layout title="إضافة مدينة">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/city.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">إضافة مدن</h2>
    @endsection
    <div class="container d-flex justify-content-between links">
        <a class="light-btn" href="{{ url('/city') }}">المدن</a>
        <a class="main-btn" href="{{ url('/city/addcity') }}">إضافة مدينة</a>
    </div>

    
      <h1>إضافة</h1>
</x-dashboard.layout>
    