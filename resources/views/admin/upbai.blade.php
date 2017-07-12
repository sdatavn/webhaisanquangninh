@extends('admin/main')
@section('title')
Thêm Bài Đăng
@endsection
@section('tieumuc')
Thêm Bài
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
                                <span class="caption-subject font-blue-madison bold uppercase">Đăng Bài Mới</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <form action="upbai" id="upbai" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label class="control-label">Tên Bài Viết</label>
                                            <input type="text" name="title" class="form-control" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Chọn Chuyên Mục</label>
                                            <select class="form-control" name="menu" id="menu">
                                                <option selected="active" value="0">--Chọn Chuyên Mục--</option>
                                                @foreach($menu as $mn)
                                                <option value="{{$mn->id}}">{{$mn->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Chọn Thể Loại</label>
                                            <select class="form-control" name="theloai" id="theloai">
                                                <option selected="active" value="0">--Chọn Thể Loại--</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Giá</label>
                                            <input type="text" name="gia" class="form-control" value=""/>
                                        </div>
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="object-fit: cover ; max-width: 200px"></div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Chọn Hình Sản Phẩm Hiển Thị </span>
                                                    <span class="fileinput-exists"> Sữa </span>
                                                    <input type="file" name="daidien1"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="fileinput-new">Chọn Hình Slide Sản Phẩm(Chỉ Nhận 3 Hình) </span>
                                                <input type="file" name="file[]" multiple>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Nội Dung</label>
                                                <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                                                <script> CKEDITOR.replace( 'editor1' ,{ 
                                                    filebrowserBrowseUrl : '../public/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                                                    filebrowserUploadUrl : '../public/responsive_filemanager/source/dialog.php?type=2&editor=ckeditor&fldr=',
                                                    filebrowserImageBrowseUrl : '../public/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=' ,
                                                    height: '400px'
                                                }); 
                                            </script>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type = "submit" name = "ok" class = "btn default">ĐĂNG BÀI</button>
                                        </div>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    $("#upbai").validate({
                                        rules:{
                                            title:{
                                                required:true,
                                            },
                                            editor1:{
                                                required:true,
                                            }
                                        },
                                        messages:{
                                            title:{
                                                required:"Vui Lòng Không Để Trống",
                                            },
                                            editor1:{
                                                required:"Vui Lòng Không Để Trống",
                                            }
                                        }
                                    })
                                </script>
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