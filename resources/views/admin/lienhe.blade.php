@extends('admin/main')
@section('title')
    Liên Hệ
@endsection
@section('tieumuc')
    Liên Hệ
@endsection
@section('content')
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form action="lienhe/save" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <textarea name="editor1" id="editor1" rows="10" cols="80">
                                                                @foreach($lienhe as $lh)
                                                                    {!!$lh->lienhe!!}
                                                                @endforeach
                                                                </textarea>
                                                                <script> CKEDITOR.replace( 'editor1' ,{ 
                                                                    filebrowserBrowseUrl : '../public/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                                                                    filebrowserUploadUrl : '../public/responsive_filemanager/source/dialog.php?type=2&editor=ckeditor&fldr=',
                                                                    filebrowserImageBrowseUrl : '../public/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=' ,
                                                                    height: '400px'
                                                                    }); 
                                                                </script>
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <button type = "submit" name = "ok" class = "btn default">CẬP NHẬT</button>
                                                            </div>
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