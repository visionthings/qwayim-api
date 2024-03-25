<x-dashboard.layout title="الاقسام">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/category.css')}}" />
    @endpush
    <a href="{{route('categories.create')}}" class="main-btn">إضافة قسم جديد</a>
    <table class="w-100 category">
        <thead>
            <tr>
                <th class="w-50">الاسم</th>
                <th class="w-25">الحالة</th>
                <th class="w-25">حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    @if($category->status ==='active')
                    مفعل
                    @else
                    غير مفعل
                    @endif
                </td>
                <td>
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="red-btn small p-2"><i class="fa-solid fa-trash"></i> حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>



</x-dashboard.layout>