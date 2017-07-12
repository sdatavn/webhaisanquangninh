@extends('main')
@section('title')
    Giới Thiệu
@endsection
@section('content')
    <main class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="row cate-title" style="padding-top: 5%">
                        <span class="article title-r">Giới thiệu</span>
                    </div>
            @foreach($thongtin as $ThongTin)
                {!!$ThongTin->gioithieu!!}
            @endforeach
            </div>
        </div>
    </div>
</main>
@endsection