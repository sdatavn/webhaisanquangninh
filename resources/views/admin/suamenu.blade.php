@extends('admin/main')
@section('title')
    Sữa Menu
@endsection
@section('tieumuc')
Sữa Menu
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
                                                    <span class="caption-subject font-blue-madison bold uppercase">Sửa Tên Menu</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <label class="control-label">Tên Menu</label>
                                                                @foreach($thongtin as $tt)
                                                                <input type="text" name="name" class="form-control" value="{{$tt->name}}" />
                                                                @endforeach
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Tên URL</label>
                                                                @foreach($thongtin as $tt)
                                                                <input type="text" name="url" class="form-control" value="{{$tt->url}}" />
                                                                @endforeach
                                                            </div>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail">
                                                                @foreach($thongtin as $tt)
                                                                <img src="{{url('public/responsive_filemanager/thumbs/quangcao')}}/{{$tt->id}}.jpg" alt="" /> 
                                                                @endforeach</div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="width: 300px"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Chọn Hình </span>
                                                                <span class="fileinput-exists"> Sữa </span>
                                                                <input type="file" name="banner"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                                                        </div>
                                                        </div>
                                                            <div class="margin-top-10">
                                                                <button type = "submit" name = "ok" class = "btn default">Sửa Menu</button>
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