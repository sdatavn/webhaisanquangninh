@extends('admin/main')
@section('title')
Quản Lý 
@endsection
@section('tieumuc')
Quản Lý Slider
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light form-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">THÊM ẢNH SlIDE</span>
                </div>                                
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="" role="form" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        <div class="form-group last">
                         \         <div class="col-md-12">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">URL IMG</label>
                                <input type="hidden" name="id1" value="1">
                                <input type="text" name="url1" class="form-control" value="" />
                            </div>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="object-fit: cover;">
                                    <img src="../public/responsive_filemanager/thumbs/slide/1.jpg" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> Chọn Hình </span>
                                            <span class="fileinput-exists"> Sữa </span>
                                            <input type="file" name="slide1"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">URL IMG</label>
                                        <input type="hidden" name="id2" value="2">
                                        <input type="text" name="url2" class="form-control" value="" />
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="object-fit: cover;">
                                            <img src="../public/responsive_filemanager/thumbs/slide/2.jpg" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Chọn Hình </span>
                                                    <span class="fileinput-exists"> Sữa </span>
                                                    <input type="file" name="slide2"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">URL IMG</label>
                                                <input type="hidden" name="id3" value="3">
                                                <input type="text" name="url3" class="form-control" value="" />
                                            </div>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="object-fit: cover;">
                                                    <img src="../public/responsive_filemanager/thumbs/slide/3.jpg" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Chọn Hình </span>
                                                            <span class="fileinput-exists"> Sữa </span>
                                                            <input type="file" name="slide3"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                        </div>                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">URL IMG</label>
                                                        <input type="hidden" name="id4" value="4">
                                                        <input type="text" name="url4" class="form-control" value="" />
                                                    </div>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="object-fit: cover;">
                                                            <img src="../public/responsive_filemanager/thumbs/slide/4.jpg" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Chọn Hình </span>
                                                                    <span class="fileinput-exists"> Sữa </span>
                                                                    <input type="file" name="slide4"> </span>
                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">URL IMG</label>
                                                                <input type="hidden" name="id5" value="5">
                                                                <input type="text" name="url5" class="form-control" value="" />
                                                            </div>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="object-fit: cover;">
                                                                    <img src="../public/responsive_filemanager/thumbs/slide/5.jpg" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Chọn Hình </span>
                                                                            <span class="fileinput-exists"> Sữa </span>
                                                                            <input type="file" name="slide5"> </span>
                                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">URL IMG</label>
                                                                        <input type="hidden" name="id6" value="6">
                                                                        <input type="text" name="url6" class="form-control" value="" />
                                                                    </div>
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="object-fit: cover;">
                                                                            <img src="../public/responsive_filemanager/thumbs/slide/6.jpg" alt="" /> </div>
                                                                            <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                                            <div>
                                                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Chọn Hình </span>
                                                                                    <span class="fileinput-exists"> Sữa </span>
                                                                                    <input type="file" name="slide6"> </span>
                                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix margin-top-10" style="padding-left: 16px">
                                                                            <span class="label label-danger">CHÚ Ý !</span>  Kích Thước Ảnh 300x187
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
                                                            </form>
                                                            <!-- END FORM-->
                                                        </div>
                                                    </div>
                                                    <!-- END PORTLET-->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endsection