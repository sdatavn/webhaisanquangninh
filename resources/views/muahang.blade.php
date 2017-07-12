@extends('main')
@section('title')
    Hướng Dẫn Mua hàng
@endsection('title')
@section('content')
    <main class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="row cate-title" style="padding-top: 5%">
                        <span class="article title-r">Hướng Dẫn Mua Hàng</span>
                    </div>
            @foreach($thongtin as $ThongTin)
                {!!$ThongTin->muahang!!}
            @endforeach
            </div>
        </div>
    </div>
</main>
@endsection