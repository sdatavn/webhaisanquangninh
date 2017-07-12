@extends('admin/main')
@section('title')
    Thêm Menu
@endsection
@section('tieumuc')
Thêm Menu
@endsection
@section('content')
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
                                                    <span class="caption-subject font-blue-madison bold uppercase">Thêm Menu Mới</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form action="" id="themmenu" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <label class="control-label">Tên Menu</label>
                                                                <input type="text" name="name" class="form-control" value="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Link URL</label>
                                                                <input type="text" name="url" class="form-control" value="" />
                                                            </div>
                                                            <label class="control-label">Hình Quảng Cáo Theo Danh Mục (Nếu Có)</label>
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="width: 300px" > </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Chọn Hình </span>
                                                                    <span class="fileinput-exists"> Sữa </span>
                                                                    <input type="file" name="banner"> </span> 
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                            </div>
                                                        </div>
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <button type = "submit" name = "ok" class = "btn default">Thêm Menu Mới</button>
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
            <script type="text/javascript">
                $("#themmenu").validate({
                    rules:{
                        name:{
                            required:true,
                        },
                        url:{
                            required:true,
                        }
                    },
                    messages:{
                        name:{
                            required:"Vui Lòng Không Để Trống",
                        },
                        url:{
                            required:"Vui Lòng Không Để Trống",
                        }
                    }
                })
            </script>
@endsection