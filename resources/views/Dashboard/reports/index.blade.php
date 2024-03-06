<x-dashboard.layout title="التقارير">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/dashboard/reports.css')}}" />
    @endpush
    @section('navContent')
      <h2 id="navhead" class="h1 mb-0">التقارير</h2>
    @endsection
    <div class="container">
        <div class="row mt-3 reportsPart">
            <a href="{{ route('reports.subscribe.view') }}" class="col-12 px-3 py-3 rounded-4 shadow mb-4 part">
                <h3>تقارير الإشتراكات</h3>
                <i class="fa-solid fa-chevron-left"></i>
            </a>

            <a href="{{ route('reports.best.places.view') }}" class="col-12 px-3 py-3 rounded-4 shadow mb-4 part">
                <h3>تقارير الأماكن الأكثر بحثاً</h3>
                <i class="fa-solid fa-chevron-left"></i>
            </a>

            <a href="{{ route('reports.interaction.view') }}" class="col-12 px-3 py-3 rounded-4 shadow mb-4 part">
                <h3>تقارير التفاعل <small>(التعليقات - التقييمات - الأسئلة - المقترحات)</small></h3>
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </div>
    </div>

    </x-dashboard.layout>
    