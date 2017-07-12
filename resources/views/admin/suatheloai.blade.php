@extends('admin/main')
@section('title')
    Sữa Thể Loại
@endsection
@section('tieumuc')
Sữa Thể Loại
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
                                                    <span class="caption-subject font-blue-madison bold uppercase">Sửa Thể Loại</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form action="" method="POST">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <label class="control-label">Tên Thể Loại</label>
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
                                                            <div class="margin-top-10">
                                                                <button type = "submit" name = "ok" class = "btn default">Sửa Thể Loại</button>
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