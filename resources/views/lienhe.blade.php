@extends('main')
@section('title')
    Liên Hệ
@endsection
@section('content')
    <main class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="row cate-title" style="padding-top: 5%">
                        <span class="article title-r">Liên Hệ</span>
                    </div>
            @foreach($thongtin as $ThongTin)
                {!!$ThongTin->lienhe!!}
            @endforeach
            </div>
        </div>
    </div>
</main>
@endsection