@extends('admin/main')
@section('title')
    Quản Lý Banner
@endsection
@section('tieumuc')
Quản Lý 
@endsection
@section('content')
<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light form-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">THÊM ẢNH BANNER</span>
                                    </div>                                
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="" role="form" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-body">
                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Banner Bên Phải Slide</label>
                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="../public/responsive_filemanager/thumbs/banner/1.jpg" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" > </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Chọn Hình </span>
                                                                <span class="fileinput-exists"> Sữa </span>
                                                                <input type="file" name="banner1"> </span> 
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="col-md-12">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="../public/responsive_filemanager/thumbs/banner/2.jpg" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Chọn Hình </span>
                                                                <span class="fileinput-exists"> Sữa </span>
                                                                <input type="file" name="banner2"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="col-md-12">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" >
                                                            <img src="../public/responsive_filemanager/thumbs/banner/3.jpg" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Chọn Hình </span>
                                                                <span class="fileinput-exists"> Sữa </span>
                                                                <input type="file" name="banner3"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-offset-3 clearfix margin-top-10" style="padding-left: 30px">
                                                    <span class="label label-danger">CHÚ Ý !</span>  Kích Thước Ảnh Sẽ Được Cắt Thành 200x128</div>
                                            </div>
                                        
                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Banner Bên Dưới Cùng</label>
                                                <div class="col-md-9">
                                                    <div class="col-md-12">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="object-fit: cover">
                                                            <img src="../public/responsive_filemanager/thumbs/banner/4.jpg" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="object-fit: cover"></div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Chọn Hình </span>
                                                                <span class="fileinput-exists"> Sữa </span>
                                                                <input type="file" name="banner4"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9" style="padding-left: 20%">
                                                    <button type = "submit" name = "ok" class = "btn btn-primary">SAVE</button>
                                                </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                    </div>
@endsection