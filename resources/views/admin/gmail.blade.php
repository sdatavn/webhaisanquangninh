@extends('admin/main')
@section('title')
    Gmail Khách Hàng
@endsection
@section('tieumuc')
    Gmail Khách Hàng
@endsection
@section('content')
<div class="row">
                        <div class="col-md-12">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-bell-o"></i>Gmail Khách Nhận Thông Báo Mới
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <i class="fa fa-briefcase"></i> Tên Gmail </th>
                                                    <th>Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($thongtin as $tt)
                                                <tr>
                                                    <td class="highlight">
                                                        <div class="success"></div>
                                                        <div style="padding-left: 10px">{{$tt->gmail}}</div>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Gmail Này?')" href="thongbao/{{$tt->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                                        <i class="fa fa-trash-o"></i> Delete </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <center>{!!$thongtin->links()!!}</center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection