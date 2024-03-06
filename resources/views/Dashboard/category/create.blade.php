<x-dashboard.layout title="إضافة قسم جديد">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/category.css')}}" />
    @endpush


    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        @include('Dashboard.category._form',['btn_text'=>'إضافة'])
    </form>

</x-dashboard.layout>