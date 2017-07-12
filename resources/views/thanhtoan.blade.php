@extends('main')
@section('title')
    Hướng Dẫn Thanh Toán
@endsection('title')
@section('content')
    <main class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="row cate-title" style="padding-top: 5%">
                        <span class="article title-r">Hướng Dẫn Thanh Toán</span>
                    </div>
            @foreach($thongtin as $ThongTin)
                {!!$ThongTin->thanhtoan!!}
            @endforeach
            </div>
        </div>
    </div>
</main>
@endsection