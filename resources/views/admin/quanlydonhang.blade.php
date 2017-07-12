@extends('admin/main')
@section('title')
Quản Lý Đơn Hàng
@endsection
@section('tieumuc')
Quản Lý Đơn Hàng
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bell-o"></i>Đơn Hàng
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-user"></i> Tên Khách Hàng </th>
                                <th class="hidden-xs"><i class="fa fa-phone"></i> Sđt </th>
                                <th class="hidden-xs"><i class="fa fa-phone"></i> địa chỉ </th>
                                <th class="hidden-xs"><i class="fa fa-user"></i> Sản Phẩm </th>
                                <th class="hidden-xs"><i class="fa fa-user"></i> Số Lượng </th>
                                <th class="hidden-xs"><i class="fa fa-user"></i> Giá </th>
                                <th class="hidden-xs"><i class="fa fa-user"></i> Tổng Tiền </th>
                                <th class="hidden-xs"><i class="fa fa-user"></i> Yêu Cầu </th>
                                <th class="hidden-xs"><i class="fa fa-user"></i> Trạng Thái </th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donhang as $dh)
                            <tr>
                                <td class="highlight">
                                    <div class="success"></div>
                                    <div style="padding-left: 10px">{{$dh->hoten}}</div>
                                </td>
                                <td>{{$dh->sdt}}</td>
                                <td>{{$dh->diachi}}</td>
                                <td>{{$dh->name}}</td>
                                <td>{{$dh->soluong}}</td>
                                <td>{{number_format($dh->gia,0)}}</td>
                                <td>{{number_format($dh->tongtien,0)}}</td>
                                <td>{{$dh->ghichu}}</td>
                                <td id="xacnhan{{$dh->id}}">@if($dh->kt==0)<input type="checkbox" name="check" id="check{{$dh->id}}" value="{{$dh->id}}"> Chưa Xác Nhận
                                    @else Xác Nhận
                                    @endif</td>
                                    <script>
                                        $('#check{{$dh->id}}').click(function() {
                                            var checked = $(this).is(':checked');
                                            var kt = $('#check{{$dh->id}}').val();
                                            if(checked){
                                                $.ajax({
                                                    url:"quanlydonhangg",
                                                    type:"get",
                                                    dataType:"json",
                                                    data:{kt:kt},
                                                });
                                                if(kt=={{$dh->id}}){
                                                $('#xacnhan{{$dh->id}}').html("Xác Nhận");
                                                }
                                            }
                                        });
                                    </script>
                                    <td>
                                        <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Đơn Đặt Hàng Này?')" href="{{url('admin/quanlydonhang')}}/{{$dh->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                            <i class="fa fa-trash-o"></i> Delete </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <center>{{ $donhang->links() }}</center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script')

        @endsection