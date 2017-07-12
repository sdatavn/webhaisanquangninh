@extends('main')
@section('title')
Giỏ Hàng
@endsection
@section('content')
<div class="container">
    <h2>GIỎ HÀNG</h2>

    <hr>
    @if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif
    @if (session()->has('error_message'))
    <div class="alert alert-danger">
        {{ session()->get('error_message') }}
    </div>
    @endif
    @if (sizeof(Cart::content()) > 0)
    <table class="table">
        <thead>
            <tr>
                <th class="table-image"></th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá Tiền</th>
                <th class="column-spacer"></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach (Cart::content() as $item)
            <tr>
                <td class="table-image"><a href="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$item->id}}1.jpg"><img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$item->id}}1.jpg" alt="Image" width="30px" class="img-responsive cart-image"></a></td>
                <td><a href="">{{ $item->name }}</a></td>
                <td>
                    <select class="quantity" data-id="{{ $item->rowId }}">
                        <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                        <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                        <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                        <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                        <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                        <option {{ $item->qty == 6 ? 'selected' : '' }}>6</option>
                        <option {{ $item->qty == 7 ? 'selected' : '' }}>7</option>
                        <option {{ $item->qty == 8 ? 'selected' : '' }}>8</option>
                        <option {{ $item->qty == 9 ? 'selected' : '' }}>9</option>
                        <option {{ $item->qty == 10 ? 'selected' : '' }}>10</option>
                    </select>
                </td>
                <td>{{ number_format($item->subtotal, 0)  }}</td>
                <td class="">                            
                    <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn-success btn-sm btn"> Xóa </button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td class="table-image"></td>
                <td></td>
                <td class="small-caps table-bg" style="text-align: right">Tổng Tiền</td>
                <td>{{Cart::subtotal()}} VNĐ</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div>
        <form action="{{ url('/thanhcong') }}" method="POST" class="side-by-side" id="thongtin">
            {!! csrf_field() !!}
            <div class="col-md-12">
                <div class="col-md-6 col-xs-6">
                    <label style="padding-top: 5px;padding-left: 13px">Tên Khách Hàng</label>
                    <input type="type" placeholder="Tên Khách Hàng" class="form-control" name="hoten">
                </div>
                <div class="col-md-6 col-xs-6">
                    <label style="padding-top: 5px;padding-left: 13px">Số Điện Thoại</label>
                    <input type="type" placeholder="Số Điện Thoại Liên Hệ" class="form-control" name="sdt">
                </div>
                <div class="col-md-6 col-xs-6">
                    <label style="padding-top: 5px;padding-left: 13px">Địa Chỉ Giao Hàng</label>
                    <input type="type" placeholder="Địa Chỉ Nhận Hàng" class="form-control" name="diachi">
                </div>
                <div class="col-md-6 col-xs-6">
                    <label style="padding-top: 5px;padding-left: 13px">Yêu Cầu Thêm Của Khách Hàng (Nếu Có)</label>
                    <input type="type" placeholder="Yêu Cầu Thêm" class="form-control" name="yeucauthem">
                </div>
            </div>
            <br>
            <center><div class="col-md-6 col-xs-6" style="padding-top: 15px"><input type="submit" class="btn btn-success btn-lg" value="Đặt Hàng"></div></center>
        </form>
        <script type="text/javascript">
            $("#thongtin").validate({
                rules:{
                    hoten:{
                        required:true,
                    },
                    sdt:{
                        required:true,
                    },
                    diachi:{
                        required:true,
                    }
                },
                messages:{
                    hoten:{
                        required:"Vui Lòng Nhập Tên Khách Hàng",
                    },
                    sdt:{
                        required:"Vui Lòng Nhập Số Điện Thoại Liên Hệ",
                    },
                    diachi:{
                        required:"Vui Lòng Nhập Địa Chỉ Nhận Hàng",
                    }
                }
            })
        </script>  
        <center>
            <div class="col-md-6 col-xs-6" style="padding-top: 15px">
                <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Hủy Giỏ Hàng">
                </form>
            </div>  
        </center> 
    </div>     
    @else

    <h3>Không Còn Sản Phẩm Nào Trong Giỏ Hàng</h3>
    <a href="{{ url('/trangchu') }}" class="btn btn-danger btn-lg">Chọn Sản Phẩm Khác</a>

    @endif

    <div class="spacer"></div>

</div> <!-- end container -->
<script>
    (function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.quantity').on('change', function() {
            var id = $(this).attr('data-id')
            $.ajax({
              type: "PATCH",
              url: '{{ url("/cart") }}' + '/' + id,
              data: {
                'quantity': this.value,
            },
            success: function(data) {
                window.location.href = '{{ url('/cart') }}';
            }
        });

        });

    })();

</script>

@endsection
