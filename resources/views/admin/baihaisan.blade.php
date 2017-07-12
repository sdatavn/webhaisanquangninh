@extends('admin/main')
@section('title')
    Quản Lý Bài Đăng
@endsection
@section('tieumuc')
Quản Lý Bài Đăng
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
                                            <a href="upbai"><button type="button" class="btn btn-success">Thêm Bài Mới</button></a>
                                            <a href="javascript:;" class="collapse"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <i class="fa fa-briefcase"></i> Tên Bài Viết </th>
                                                        <th class="hidden-xs">
                                                        <i class="fa fa-user"></i> Thể Loại </th>
                                                    <th>Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sortable">
                                            @foreach($noidung as $NoiDung)
                                                <tr id="{{$NoiDung->id}}">
                                                    <td class="highlight">
                                                        <div class="success"></div>
                                                        <div style="padding-left: 10px">{{$NoiDung->title}}</div>
                                                    </td>
                                                    @foreach($menu as $Menu)
                                                        @if($NoiDung->id_menu==$Menu->id)
                                                    <td>{{$Menu->name}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>
                                                        <a href="{{$NoiDung->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                                            <i class="fa fa-pencil icon-black"></i> Edit </a>
                                                        <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Bài Này?')" href="xoa/{{$NoiDung->id}}" class="btn btn-outline btn-circle dark btn-sm black">
                                                            <i class="fa fa-trash-o"></i> Delete </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <center>{!!$noidung->links()!!}</center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection