@extends('admin/main')
@section('title')
Sữa Bài
@endsection
@section('tieumuc')
Sữa Bài
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
                                    <form action="suabai" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @foreach($noidung as $NoiDung)
                                        <div class="form-group">
                                            <label class="control-label">Tên Bài Viết</label>
                                            <input type="hidden" name="id" value="{{$NoiDung->id}}"/>
                                            <input type="text" name="title" class="form-control" value="{{$NoiDung->title}}" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Chọn Chuyên Mục</label>
                                            <select class="form-control" name="menu" id="menu">
                                                @foreach($theloai as $TheLoai)
                                                <option @if($TheLoai->id==$NoiDung->id_menu)selected="selected" @endif value="{{$TheLoai->id}}">{{$TheLoai->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Chọn Thể Loại</label>
                                            <select class="form-control" name="theloai" id="theloai">
                                                <option selected="active" value="{{$idd}}">{{$namee}}</option>
                                                @foreach($theloai1 as $tl1)
                                                <option value="{{$tl1->id}}">{{$tl1->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Giá</label>
                                            <input type="text" name="gia" class="form-control" value="{{$NoiDung->gia}}"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$NoiDung->id}}.jpg" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="object-fit: cover ; max-width: 200px"></div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Chọn Hình Sản Phẩm Hiển Thị </span>
                                                        <span class="fileinput-exists"> Sữa </span>
                                                        <input type="file" name="daidien1"> </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    @foreach($img as $im)
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="{{url('public/responsive_filemanager/thumbs/baiviet')}}/{{$im->name}}.jpg" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="object-fit: cover ; max-width: 200px"></div>
                                                        </div>
                                                        <input type="checkbox" name="check" id="check{{$im->id}}" value="{{$im->name}}">
                                                        <script>
                                                        $('#check{{$im->id}}').click(function() {
                                                                var checked = $(this).is(':checked');
                                                                var kt = $('#check{{$im->id}}').val();
                                                                console.log(kt);
                                                                if(checked){
                                                                    $.ajax({
                                                                        url:"suabaii",
                                                                        type:"get",
                                                                        dataType:"json",
                                                                        data:{kt:kt},
                                                                    });
                                                                }
                                                            });
                                                        </script>
                                                        @endforeach
                                                    </div>
                                                    <div class="form-group">
                                                        <span class="fileinput-new">Chọn Hình Slide Sản Phẩm (Chỉ Nhận 3 Hình) </span>
                                                        <input type="file" name="file[]" multiple>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Nội Dung</label>
                                                        <textarea name="editor1" id="editor1" rows="10" cols="80">
                                                            {!!$NoiDung->noidung!!}
                                                        </textarea>
                                                        <script> CKEDITOR.replace( 'editor1' ,{ 
                                                            filebrowserBrowseUrl : '../responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                                                            filebrowserUploadUrl : '../responsive_filemanager/source/dialog.php?type=2&editor=ckeditor&fldr=',
                                                            filebrowserImageBrowseUrl : '../responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=' ,
                                                            height: '400px'
                                                        }); 
                                                    </script>
                                                </div>
                                                @endforeach
                                                <div class="margin-top-10">
                                                    <button type = "submit" name = "ok" class = "btn default">SỮA BÀI</button>
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