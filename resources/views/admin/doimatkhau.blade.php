@extends('admin/main')
@section('title')
    Đổi Mật Khẩu 
@endsection
@section('tieumuc')
    Đổi Mật Khẩu 
@endsection
@section('content')
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Sửa Tên Menu</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <label class="control-label">Mật Khẩu Củ</label>
                                                                <input type="password" name="mkcu" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Mật Khẩu Mới</label>
                                                                <input type="password" name="mkmoi" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Nhập Lại Mật Khẩu Mới</label>
                                                                <input type="password" name="rmkmoi" class="form-control" />
                                                            </div>
                                                        </div>
                                                            <div class="margin-top-10">
                                                                <button type = "submit" name = "ok" class = "btn default">Đổi Mật Khẩu</button>
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection