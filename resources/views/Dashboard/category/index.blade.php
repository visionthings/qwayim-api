<x-dashboard.layout title="الاقسام">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/category.css')}}" />
    @endpush
    <a href="{{route('categories.create')}}">إضافة قسم جديد</a>
    <table>
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الحالة</th>
                <th>حذف</th>
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
                        <button type="submit">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>



</x-dashboard.layout>