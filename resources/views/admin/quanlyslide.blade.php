@extends('admin/main')
@section('title')
Quản Lý Slider 
@endsection
@section('tieumuc')
Quản Lý Slider
@endsection
@section('content')
@if (session()->has('success_message'))
<div class="alert alert-success">
    {{ session()->get('success_message') }}
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bell-o"></i>Bài Đăng
                </div>
                <div class="tools">
                    <a href="quanlyslide/uphinh"><button type="button" class="btn btn-success">Thêm Slide Mới</button></a>
                    <a href="javascript:;" class="collapse"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <i class="fa fa-briefcase"></i>Hình Ảnh Slide</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @foreach($image as $im)
                                <tr>
                                    <td class="highlight">
                                    <center><img src="{{url('public/responsive_filemanager/thumbs/slide')}}/{{$im->id}}.jpg" width="200px"></center>
                                    </td>
                                    <td>
                                        <a href="quanlyslide/suahinh/{{$im->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                            <i class="fa fa-pencil icon-black"></i> Edit </a>
                                            <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Hình Này?')" href="quanlyslide/xoahinh/{{$im->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                                <i class="fa fa-trash-o"></i> Delete </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection