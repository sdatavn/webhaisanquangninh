@extends('admin/main')
@section('title')
Quản Lý Thông Tin Website
@endsection
@section('tieumuc')
Thông Tin Liên Hệ
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light form-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Input Masks</span>
                </div>

            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                @foreach($lienhe as $lh)
                <form action="capnhat" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Trang Web</label>
                            <div class="col-md-4">
                                <input class="form-control" value="{{$lh->tentrangweb}}" name="tenwebsite" type="text" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">SĐT Liên Hệ</label>
                            <div class="col-md-4">
                                <input class="form-control" value="{{$lh->zalo}}" name="sdt" type="text" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Địa Chỉ</label>
                            <div class="col-md-4">
                                <input class="form-control" value="{{$lh->diachi}}" name="diachi" type="text" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Group Facebook (Nếu Có)</label>
                            <div class="col-md-4">
                                <input class="form-control" value="{{$lh->fanpage}}" name="facebook" type="text" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Group Gmail (Nếu Có)</label>
                            <div class="col-md-4">
                                <input class="form-control" value="{{$lh->google}}" name="gmail" type="text" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Link Giới Thiệu Youtube (Nếu Có)</label>
                            <div class="col-md-4">
                                <input class="form-control" value="{{$lh->youtube}}" name="youtube" type="text" />

                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-md-4">LOGO Trang Web</label>
                            <div class="col-md-4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="object-fit: cover;">
                                        <img src="{{url('public/responsive_filemanager/thumbs')}}/logo.png" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Chọn Hình </span>
                                                <span class="fileinput-exists"> Sữa </span>
                                                <input type="file" name="logo"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn blue">
                                            <i class="fa fa-check"></i> Cập Nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endforeach
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
            @endsection