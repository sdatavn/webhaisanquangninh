@extends('admin/main')
@section('title')
Sữa Slider 
@endsection
@section('tieumuc')
Sữa Slider 
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
                <form action="" role="form" id="kiemtra" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        <div class="form-group last">
                            <div class="col-md-12">
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">URL IMG</label>
                                    <input type="text" name="url" class="form-control" value="{{$url}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="object-fit: cover;">
                                    <img src="{{url('public/responsive_filemanager/thumbs/slide')}}/{{$id}}.jpg" alt="" />
                                        <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Chọn Hình </span>
                                                <span class="fileinput-exists"> Sữa </span>
                                                <input type="file" name="slide"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                            </div>
                                        </div>

                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">CHÚ Ý !</span>  Kích Thước Ảnh 300x187
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
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $("#kiemtra").validate({
        rules:{
            url:{
                required:true,
            }
        },
        messages:{
            url:{
                required:"Vui Lòng Không Để Trống",
            }
        }
    })
</script>
@endsection